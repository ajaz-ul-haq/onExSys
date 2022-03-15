<?php

namespace App\Events;

use App\Models\Student;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;

class createStudent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($name,$dob,$email,$phone,$class,$roll,$password,$token)
    {
        $this->name = $name;
        $this->dob = $dob;
        $this->email = $email;
        $this->phone = $phone;
        $this->class = $class;
        $this->roll = $roll;
        $this->password = $password;
        $this->token = $token;


        $student = new Student;
        $student->name = $this->name;
        $student->dob = $this->dob;
        $student->email = $this->email;
        $student->phone = $this->phone;
        $student->class = $this->class;
        $student->rollno = $this->roll;
        $student->password = $this->password;
        $student->status = $this->token;
        $student->created_at = Carbon::now();
        $student->updated_at = Carbon::now();
        $student->save();

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
