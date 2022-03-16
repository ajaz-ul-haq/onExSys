<?php

namespace App\Listeners;

use App\Events\createTeacher;
use App\Models\Admin;
use App\Notifications\userNotification;

class alertTeacher
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
     * @param  \App\Events\createTeacher  $event
     * @return void
     */
    public function handle(createTeacher $event)
    {
        $admin = Admin::find(1);
        $admin->notify(new userNotification($event->name,'teacher'));
    }
}
