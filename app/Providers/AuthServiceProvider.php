<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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

        Gate::define('view-comment', function($user, $comment) {
            return $user->id === $comment->user_id;
        });

        Gate::define('view-expense', function($user, $expense) {
            return $user->id === $expense->user_id;
        });

        Gate::before(function($user) {
            if($user->isAdmin()) {
                return true;
            }
        });
    }
}
