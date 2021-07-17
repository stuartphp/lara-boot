<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->date('action_date');
            $table->string('action');
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('document_id')->nullable();
            $table->foreignId('store_id')->constrained();
            $table->integer('down')->nullable();
            $table->integer('up')->nullable();
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
        Schema::dropIfExists('product_activities');
    }
}
