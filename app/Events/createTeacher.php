<?php

namespace App\Events;

use App\Models\Teacher;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class createTeacher
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


        $teacher = new Teacher;
        $teacher->name = $this->name;
        $teacher->email = $this->email;
        $teacher->username = $this->username;
        $teacher->dob = $this->dob;
        $teacher->password = $this->password;
        $teacher->status = $token;
        $teacher->created_at = Carbon::now();
        $teacher->updated_at = Carbon::now();
        $teacher->save();

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
