<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('notification_id')->nullable(false);
            $table->unsignedInteger('action_event_id')->nullable(false);

            $table->unsignedInteger('sender_id')->nullable(false);
            $table->unsignedInteger('patient_id')->nullable(false);

            $table->unsignedInteger('device_id')->nullable(false);

            $table->string('source'); // Patient, Caretaker, Family

            $table->boolean('active')->default(true);
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
        Schema::drop('conversations');
    }
}
