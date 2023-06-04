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
            $table->tinyInteger('category_id');
            $table->tinyInteger('section_id');
            $table->tinyInteger('brand_id');
            $table->tinyInteger('vendor_id');
            $table->tinyInteger('admin_id');
            
            $table->string('admin_type');
            $table->string('product_name');
            $table->string('product_code');
            $table->string('product_color');
            $table->string('main_image');
            $table->string('description');
            $table->integer('product_price');
            $table->integer('product_discount')->nullable();
            $table->integer('product_weight');
            $table->string('product_video');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->enum('is_featured',['yes','no']);
            $table->tinyInteger('status');
            
          

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
