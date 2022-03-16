<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use Notifiable;
    use HasFactory;
    public function privileges(){
        return $this->hasOne('App\Models\Privileges');
    }
}
