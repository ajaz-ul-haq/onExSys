<?php

namespace App\Listeners;

use App\Events\createAdmin;
use App\Models\Admin;
use App\Notifications\userNotification;

class alertAdmin
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
     * @param  \App\Events\createAdmin  $event
     * @return void
     */
    public function handle(createAdmin $event)
    {
        $admin = Admin::find(1);
        $admin->notify(new userNotification($event->name,'admin'));
    }
}
