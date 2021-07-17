<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_id')->constrained();
            $table->dateTime('action_date');
            $table->string('subject');
            $table->foreignId('entity_contact_id')->constrained();
            $table->dateTime('deadline')->nullable();
            $table->string('tags');
            $table->unsignedInteger('task_status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('assigned_to');
            $table->timestamps();
            $table->foreign('created_by')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('assigned_to')->on('users')->references('id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_tasks');
    }
}
