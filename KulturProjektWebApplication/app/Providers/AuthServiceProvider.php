<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Role;
use App\Models\User;
use App\Policies\EventPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Event::class => EventPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //Registering and Defining Gates for example

        Gate::define("eventHandler", function(User $user) {
            return $user->role->slug == "dev"; 
        });
    }
}
