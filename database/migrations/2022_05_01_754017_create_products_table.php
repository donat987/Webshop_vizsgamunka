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
            $table->string('name');
            $table->string('barcode');
            $table->text('description');
            $table->unsignedBigInteger('categoryID');
            $table->date('vintage');
            $table->integer('capacity');
            $table->integer('alcohol');
            $table->unsignedBigInteger('brandID');
            $table->unsignedBigInteger('fruitspeciesID');
            $table->unsignedBigInteger('vatID');
            $table->integer('price');
            $table->integer('actionprice');
            $table->integer('quantity');
            $table->string('picturename');
            $table->unsignedBigInteger('createduserID');
            $table->unsignedBigInteger('countryID');
            $table->timestamps();
            $table->foreign('categoryID')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('brandID')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('fruitspeciesID')->references('id')->on('fruitspecies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vatID')->references('id')->on('vats')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('createduserID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('countryID')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');
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
