<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitySetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_setups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->constrained();
            $table->bigInteger('credit_limit')->nullable();
            $table->char('currency_code', 3)->nullable();
            $table->unsignedTinyInteger('payment_terms')->default(1);
            $table->char('default_tax', 2)->default('01');
            $table->string('price_list', 50)->nullable();
            $table->boolean('accept_electronic_documents')->default(1);
            $table->string('documents_contact')->nullable();
            $table->string('documents_email')->nullable();
            $table->unsignedInteger('statement_message')->nullable();
            $table->string('statement_contact')->nullable();
            $table->string('statement_email')->nullable();
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
        Schema::dropIfExists('entity_setups');
    }
}
