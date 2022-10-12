<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::make($password);
    }


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * Check if user has Role
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role){
        return null !== $this->roles()->where('name', $role)->first();
    }
    /**
     * checks whether a user has more than one role
     * @param array $role
     * @return bool
     */
    public function hasRoles(array $role){
        return null !== $this->roles()->whereIn('name', $role)->first();
    }



}
