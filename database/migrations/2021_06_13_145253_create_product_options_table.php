<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('product_category_id')->constrained();
            $table->string('product_code');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('keywords')->nullable();
            $table->string('barcode')->nullable();
            $table->string('isbn_number')->nullable();
            $table->double('cost_price')->nullable();
            $table->foreignId('product_unit_id')->constrained();
            $table->unsignedInteger('deductable');
            $table->double('price_list1')->nullable();
            $table->double('price_list2')->nullable();
            $table->double('price_list3')->nullable();
            $table->double('price_list4')->nullable();
            $table->double('price_list5')->nullable();
            $table->double('special')->nullable();
            $table->dateTime('special_from')->nullable();
            $table->dateTime('special_to')->nullable();
            $table->boolean('allow_tax')->default(1);
            $table->char('purchase_tax_type', 2);
            $table->char('sales_tax_type', 2);
            $table->boolean('sales_commission_item');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_options');
    }

}
