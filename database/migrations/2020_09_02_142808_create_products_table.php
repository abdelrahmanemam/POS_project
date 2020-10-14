<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class                                                                 CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onDelete('cascade');

            $table->string('title');
            $table->integer('regular_price');
            $table->integer('sale_price');
            $table->integer('sku')->unique()->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('weight')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category');
    }
}
