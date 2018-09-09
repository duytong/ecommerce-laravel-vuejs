<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('sku');
            $table->string('name');
            // $table->text('description');
            // $table->string('thumb');
            // $table->string('image');
            // $table->unsignedInteger('original_price');
            // $table->unsignedInteger('promotion_price')->nullable();
            // $table->unsignedInteger('quantity');
            // $table->unsignedInteger('quantity_sold')->default(0);
            // $table->double('rating', 2, 1)->default(0);
            // $table->unsignedInteger('view')->default(0);
            // $table->unsignedInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
