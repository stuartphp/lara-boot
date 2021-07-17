<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journal_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->char('journal_code', 2);
            $table->unsignedBigInteger('transaction_flow_id');
            $table->date('action_date');
            $table->unsignedBigInteger('document_id')->nullable();
            $table->string('account_number');
            $table->unsignedBigInteger('entity_id')->nullable();
            $table->string('entity_name');
            $table->string('description');
            $table->string('reference')->nullable();
            $table->string('type')->nullable();
            $table->char('tax_type', 2);
            $table->unsignedInteger('affected_journal');
            $table->char('ledger', 7);
            $table->bigInteger('debit_amount');
            $table->bigInteger('credit_amount');
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
        Schema::dropIfExists('journal_entries');
    }
}
