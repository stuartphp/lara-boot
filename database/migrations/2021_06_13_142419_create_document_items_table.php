<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained();
            $table->foreignId('store_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->string('code')->nullable();
            $table->string('name');
            $table->unsignedBigInteger('unit');
            $table->bigInteger('quantity');
            $table->bigInteger('unit_price');
            $table->bigInteger('tax')->nullable();
            $table->bigInteger('price_excl');
            $table->bigInteger('total');
            $table->boolean('is_service')->default(0);
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
        Schema::dropIfExists('document_items');
    }
}
