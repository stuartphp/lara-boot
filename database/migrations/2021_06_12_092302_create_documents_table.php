<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('document_flow_id');
            $table->string('document_type', 30);
            $table->char('gcs', 1);
            $table->date('action_date');
            $table->string('account_number');
            $table->unsignedBigInteger('entity_id');
            $table->string('entity_name');
            $table->string('document_number');
            $table->text('physical_address');
            $table->text('delivery_address');
            $table->string('entity_reference')->nullable();
            $table->unsignedBigInteger('salesperson_id')->nullable();
            $table->date('due_date')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedSmallInteger('financial_period');
            $table->unsignedInteger('courier_id')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('document_image')->nullable();
            $table->bigInteger('total_nett_price')->nullable();
            $table->bigInteger('total_excl')->nullable();
            $table->bigInteger('total_discount')->nullable();
            $table->bigInteger('total_tax')->nullable();
            $table->bigInteger('total_amount')->nullable();
            $table->boolean('is_locked')->default(0);
            $table->boolean('on_hold')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('created_by')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
