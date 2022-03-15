<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\createTeacher' => [
            'App\Listeners\alertTeacher',
        ],
        'App\Events\createStudent' => [
            'App\Listeners\alertStudent',
        ],
        'App\Events\userLogin' => [
            'App\Listeners\alertUser',
        ],
        'App\Events\createAdmin' => [
            'App\Listeners\alertAdmin',
        ],
        'App\Events\sendActivationEmail' => [
            'App\Listeners\listenActivationEmail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
