<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('location')->nullable();
            $table->string('geolocation')->nullable();
            $table->string('device')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('browser')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_infos');
    }
}
