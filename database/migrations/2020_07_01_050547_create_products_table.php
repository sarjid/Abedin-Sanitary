<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('company_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->string('product_name');
            $table->string('product_slug');
            $table->text('short_description');
            $table->text('long_description');
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three');
            $table->string('main_slider')->nullable();
            $table->integer('status')->default(1);
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
}
