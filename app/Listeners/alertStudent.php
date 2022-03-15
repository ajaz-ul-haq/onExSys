<?php

namespace App\Listeners;

use App\Events\createStudent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
        //
    }
}
