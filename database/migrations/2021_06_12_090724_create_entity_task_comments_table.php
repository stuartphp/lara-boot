<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityTaskCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_task_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entity_task_id')->constrained();
            $table->dateTime('action_date');
            $table->text('comment');
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
        Schema::dropIfExists('entity_task_comments');
    }
}
