<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    use HasFactory;

    protected $fillable = ["name"];

    
    //Calling the users method on the role model
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
