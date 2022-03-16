<?php

namespace App\Listeners;

use App\Events\createStudent;
use App\Models\Admin;
use App\Notifications\userNotification;

class alertStudent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\createStudent  $event
     * @return void
     */
    public function handle(createStudent $event)
    {
        $admin = Admin::find(1);
        $admin->notify(new userNotification($event->name,'student'));
        //
    }
}
