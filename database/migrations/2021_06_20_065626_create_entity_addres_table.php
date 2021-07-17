<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityAddresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->constrained();
            $table->string('physical_address1');
            $table->string('physical_address2')->nullable();
            $table->unsignedInteger('physical_suburb');
            $table->unsignedInteger('physical_city');
            $table->unsignedInteger('physical_state');
            $table->unsignedInteger('physical_country');
            $table->string('physical_code', 20);
            $table->string('delivery_address1');
            $table->string('delivery_address2')->nullable();
            $table->unsignedInteger('delivery_suburb');
            $table->unsignedInteger('delivery_city');
            $table->unsignedInteger('delivery_state');
            $table->unsignedInteger('delivery_country');
            $table->string('delivery_code', 20);
            $table->bigInteger('delivery_group_id')->nullable();
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
        Schema::dropIfExists('entity_addres');
    }
}
