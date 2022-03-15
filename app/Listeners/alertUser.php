<?php

namespace App\Listeners;

use App\Events\userLogin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class alertUser
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
     * @param  \App\Events\userLogin  $event
     * @return void
     */
    public function handle(userLogin $event)
    {
        //
    }
}
