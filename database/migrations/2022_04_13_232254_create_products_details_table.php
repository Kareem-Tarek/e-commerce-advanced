<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// class CreateProductsTable extends Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_details', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->longText('description')->nullable(); //
            //$table->string('image');
            $table->decimal('price');
            $table->decimal('discount')->default(0);
            $table->string('brand_name')->default('Unknown');
            //Start FKs
            $table->string('supplier_id')->nullable();   //!!! NOT NULL !!!, FK: for supplier relationship (from users table)
            $table->string('sub_cat_id')->nullable();   //!!! NOT NULL !!!, FK: (from sub-categories table)
            $table->integer('create_user_id')->nullable();
            $table->integer('update_user_id')->nullable();
            $table->integer('delete_user_id')->nullable();
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
        Schema::dropIfExists('products_details');
    }
};
