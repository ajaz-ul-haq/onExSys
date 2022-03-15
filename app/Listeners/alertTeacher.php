<?php

namespace App\Listeners;

use App\Events\createTeacher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redirect;

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
//        echo "<div class='container-fluid alert alert-success'><strong>Account Created Successfully!!<a style='color:green' href='login'> <em>Login Now</em></a> </strong></div>";
    }
}
