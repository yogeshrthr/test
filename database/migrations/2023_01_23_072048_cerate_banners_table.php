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
        Schema::create('banners' , function ( Blueprint $table ){
            $table->id();
            $table->string('name');
            $table->string('alt');
            $table->string('link');
            $table->string('type');
            $table->string('title');
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
        Schema::dropIfExists('banners');
    }
};
