<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_banks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->constrained();
            $table->string('bank');
            $table->string('branch')->nullable();
            $table->string('branch_code')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('swift_code')->nullable();
            $table->text('beneficiary_address')->nullable();
            $table->text('bank_address')->nullable();
            $table->unsignedInteger('bank_country_id')->nullable();
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
        Schema::dropIfExists('entity_banks');
    }
}
