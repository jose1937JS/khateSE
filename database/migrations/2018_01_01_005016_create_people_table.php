<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 64);
            $table->string('last_name', 64);
            $table->string('avatar')->nullable()->default('user.png');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
