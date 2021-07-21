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
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->foreignId('product_unit_id')->constrained();
            $table->integer('on_hand');
            $table->unsignedInteger('deductable');
            $table->unsignedInteger('weight_gr')->nullable();
            $table->unsignedInteger('length_cm')->nullable();
            $table->unsignedInteger('width_cm')->nullable();
            $table->unsignedInteger('height_cm')->nullable();
            $table->unsignedInteger('price_list1')->nullable();
            $table->unsignedInteger('price_list2')->nullable();
            $table->unsignedInteger('price_list3')->nullable();
            $table->unsignedInteger('special')->nullable();
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
