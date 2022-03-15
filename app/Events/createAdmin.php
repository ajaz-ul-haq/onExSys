<?php

namespace App\Events;

use App\Models\Admin;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;


class createAdmin
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name,$email,$username,$dob,$password,$token)
    {
        $this->name = $name;
        $this->dob = $dob;
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
        $this->token = $token;


        $admin = new Admin;
        $admin->name = $this->name;
        $admin->email = $this->email;
        $admin->username = $this->username;
        $admin->dob = $this->dob;
        $admin->password = $this->password;
        $admin->status = $this->token;
        $admin->created_at = Carbon::now();
        $admin->updated_at = Carbon::now();
        $admin->save();


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
