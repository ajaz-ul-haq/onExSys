<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students',function(Blueprint $table){
        $table->id();
        $table->string('name');
        $table->date('dob');
        $table->string('email');
        $table->bigInteger('phone');
        $table->string('class');
        $table->bigInteger('rollno');
        $table->string('password');
        $table->string('status');
        $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
