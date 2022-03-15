<?php

namespace App\Listeners;

use App\Events\createAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
