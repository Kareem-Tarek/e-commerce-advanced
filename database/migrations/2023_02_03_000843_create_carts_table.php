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
        Schema::create('carts', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('address')->nullable();
            $table->string('product_name');
            $table->integer('price');
            $table->string('image')->nullable();
            $table->float('discount')->default(0);
            $table->integer('quantity')->default(1);
            $table->string('cat_id');
            $table->string('sub_cat_id');
            $table->longText('description')->nullable();
            $table->integer('available_quantity')->nullable();
            $table->integer('updated_used_id')->nullable();
            //Start FKs
            $table->integer('customer_id');
            $table->integer('product_id');
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
        Schema::dropIfExists('carts');
    }
};
