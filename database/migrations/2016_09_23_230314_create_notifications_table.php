<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('device_option_id')->nullable(false);
            $table->unsignedInteger('patient_id')->nullable(false);
            $table->unsignedInteger('caretaker_id')->nullable(false);
            $table->unsignedInteger('device_id')->nullable(false);
            $table->unsignedInteger('action_id')->nullable(true);

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
        Schema::drop('notifications');
    }
}
