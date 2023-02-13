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
        Schema::create('contact_us', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('info_number');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('subject')->nullable();
            $table->longText('message');
            $table->string('create_user_id')->nullable();
            $table->string('user_type')->nullable();
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
        Schema::dropIfExists('contact_us');
    }
};
