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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->enum('rating_level' , [1, 2, 3, 4, 5]);
            $table->longText('comment');
            //Start FKs
            $table->string('customer_id');   // FK: (from users table)
            $table->string('customer_name');   // FK: (from users table)
            $table->integer('product_id');   // FK: (from products table)
            $table->string('product_name');   // FK: (from products table)
            //End FKs
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
        Schema::dropIfExists('feedbacks');
    }
};
