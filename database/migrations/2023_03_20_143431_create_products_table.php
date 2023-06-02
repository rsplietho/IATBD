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
            $table->increments('id');
            $table->foreignId('owner');
            $table->string('name');
            $table->string('description')->nullable();
            $table->foreignId('category');
            $table->string('image')->nullable();
            $table->foreignId('loaned_to')->nullable();
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('users');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('loaned_to')->references('id')->on('users');
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
