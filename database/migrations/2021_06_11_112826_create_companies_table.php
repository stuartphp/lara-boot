<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->char('attela_reference', 20)->unique();
            $table->foreignId('user_id');
            $table->string('trading_name');
            $table->string('registered_as')->nullable();
            $table->string('registration_number', 50)->nullable();
            $table->string('vat_number', 50)->nullable();
            $table->string('contact_name');
            $table->string('contact_number');
            $table->text('physical_address');
            $table->text('postal_address')->nullable();
            $table->string('domain')->nullable();
            $table->string('url_contact_us')->nullable();
            $table->string('url_terms_and_conditions')->nullable();
            $table->string('url_privacy_policy')->nullable();
            $table->string('slogan')->nullable();
            $table->string('document_logo')->nullable();
            $table->string('website_logo')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
