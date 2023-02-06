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
        Schema::create('sub_categories', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            //$table->enum('gender', ['For Her', 'For Him', 'Unisex']);
            //Start FKs
            $table->string('cat_id');   // FK: (from categories table)
            //End FKs
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
        Schema::dropIfExists('sub_categories');
    }
};
