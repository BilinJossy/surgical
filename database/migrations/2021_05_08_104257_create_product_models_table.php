<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cid');
            $table->foreign('cid')->references('id')->on('category_models')->onUpdate('cascade')->OnDelete('cascade');
            $table->unsignedBigInteger('bid');
            $table->foreign('bid')->references('id')->on('brand_models')->onUpdate('cascade')->OnDelete('cascade');
            $table->string('name');
            $table->string('des');
            $table->integer('qty');
            $table->string('cost');
            $table->string('sell');
            $table->string('image');
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
        Schema::dropIfExists('product_models');
    }
}
