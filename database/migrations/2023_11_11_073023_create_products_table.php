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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer("category_id")->nullable();
            $table->integer("subcategory_id")->nullable();
            $table->string("product_name")->nullable();
            $table->string("product_image")->nullable();
            $table->string("product_gallery")->nullable();
            $table->integer("quantity")->nullable();
            $table->integer("product_price")->nullable();
            $table->integer("special_price")->nullable();
            $table->tinyInteger("is_trending")->nullable();
            $table->tinyInteger("is_popular")->nullable();
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
        Schema::dropIfExists('products');
    }
};
