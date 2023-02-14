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
        Schema::create('users', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('avatar')->nullable();
            $table->string('cover')->nullable();
            $table->string('username')->unique();
            $table->string('name')->nullable();    
            $table->enum('user_type', ['admin','moderator','supplier','customer']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->unique()->nullable();
            $table->longText('bio')->nullable();
            $table->enum('gender', ['male','female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->enum('status', ['active', 'inactive', 'blocked'])->default('active');
            $table->integer('create_user_id')->nullable(); // for dashboard (admin & moderator) when they create user
            $table->integer('update_user_id')->nullable(); // for dashboard (admin) when they update user
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
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
};
