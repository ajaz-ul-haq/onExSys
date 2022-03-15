<?php

namespace App\Listeners;

use App\Events\sendActivationEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class listenActivationEmail
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
     * @param  \App\Events\sendActivationEmail  $event
     * @return void
     */
    public function handle(sendActivationEmail $event)
    {
        //
    }
}
