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
            $table->foreignId('company_id')->constrained();
            $table->foreignId('product_category_id')->constrained();
            $table->string('product_code');
            $table->string('name');
            $table->text('description');
            $table->string('keywords')->nullable();
            $table->string('barcode')->nullable();
            $table->string('isbn_number')->nullable();
            $table->string('main_image')->nullable();
            $table->unsignedInteger('viewed')->nullable();
            $table->boolean('is_service');
            $table->boolean('is_active');
            $table->boolean('is_feature');
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
