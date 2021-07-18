<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained();
            $table->char('gcs', 1);
            $table->char('account_number',20);
            $table->string('registered_name')->nullable();
            $table->string('trading_name');
            $table->string('telephone');
            $table->string('fax')->nullable();
            $table->string('email');
            $table->string('vat_number')->nullable();
            $table->boolean('is_newsletter')->default(0);
            $table->boolean('is_sms')->default(0);
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('entities');
    }
}
