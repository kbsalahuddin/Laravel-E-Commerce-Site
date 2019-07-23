<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            
            $table->bigIncrements('productId');
            $table->integer('categoryId');
            $table->integer('brandId');
            $table->string('productName');
            $table->text('productShortDescription');
            $table->text('productLongDescription');
            $table->float('productPrice');
            $table->text('productImage');
            $table->string('productSize');
            $table->string('productStatus');
            
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
