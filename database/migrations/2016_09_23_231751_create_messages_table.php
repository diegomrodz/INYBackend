<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('conversation_id')->nullable(false);
            
            $table->string('text', 30)->nullable(false);

            $table->string('left_option', 10)->default("Não");
            $table->string('right_option', 10)->default("Sim");

            $table->string('answer')->nullable(true);

            $table->boolean('has_been_seen')->default(false);
            $table->boolean('has_been_answered')->default(false);

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
        Schema::drop('messages');
    }
}
