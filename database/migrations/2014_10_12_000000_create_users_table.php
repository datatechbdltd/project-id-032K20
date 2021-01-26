<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id');
            $table->string('name');
            $table->string('username')->nullable()->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('language')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('password');
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->string('avatar')->nullable();
            $table->boolean('status')->default('0')->comment('0 disable | 1 enable');
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
