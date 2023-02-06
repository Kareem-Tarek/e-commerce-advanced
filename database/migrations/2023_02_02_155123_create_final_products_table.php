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
        Schema::create('final_products', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->enum('size' , ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL']);
            $table->string('color');
            $table->string('available_quantity');
            $table->string('image');
            //Start Fks
            $table->string('product_id');
            $table->string('supplier_id'); //
            //End FKs
            $table->integer('create_user_id')->nullable();
            $table->integer('update_user_id')->nullable();
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
        Schema::dropIfExists('final_products');
    }
};
