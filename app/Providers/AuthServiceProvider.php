<?php

namespace App\Providers;

use App\User;
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

        Gate::define('manage-user',function ($user){
            return $user->has_any_role(['admin', 'author']);
        });

        Gate::define('edit-user',function ($user){
            return $user->has_any_role(['admin', 'author']);
        });

        Gate::define('delete-user',function ($user){
            return $user->has_role('admin');
        });

        Gate::define('edit-post', function ($user, $post_id){
            $role = $user->has_role('admin');
            return $user->id === $post_id || $role;
        });
    }
}
