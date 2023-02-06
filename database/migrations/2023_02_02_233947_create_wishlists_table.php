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
        Schema::create('wishlists', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');
            $table->longText('customer_address');
            $table->string('product_name');
            $table->string('product_image');
            $table->integer('price');
            $table->integer('discount')->default(0);
            //Start FKs
            $table->integer('product_id')->nullable();  //FK: (from final products table)
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
        Schema::dropIfExists('wishlists');
    }
};
