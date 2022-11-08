<?php

namespace App\Providers;

 use Illuminate\Support\Facades\Gate;
 use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() 
    {
        $this->registerPolicies();
        //The has role method applied to the gate is defined in the User Model
        Gate::define('isAdmin', function($user){
            return $user->hasRole('IT Administrator');
            
            //to determine if a user has more than one role use the following
            //return $user->hasRoles(['admin', manager]);

        });

        Gate::define('manageAssets', function($user){
            return $user->hasRoles(['IT Administrator', 'Manager']);

        }); 
        
        Gate::define('viewUsers', function($user){
            return $user->hasRoles(['Manager', 'Technical Support']);

        });


    }
}
