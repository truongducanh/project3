<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* admin */
        Gate::define('admin', function($user) {
            return $user->role == 0;
        });
        
        /* menistry  */
         Gate::define('menistry', function($user) {
             return $user->role == 1;
        });
       
        /* student */
        Gate::define('student', function($user) {
             return $user->role == 2;
        });
    }
}
