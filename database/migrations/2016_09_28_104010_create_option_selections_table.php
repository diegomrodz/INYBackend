<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionSelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_selections', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('device_id')->nullable(false);
            $table->unsignedInteger('patient_id')->nullable(false);
           
            $table->text('option')->nullable(false);

            $table->boolean('has_been_processed')->default(false);

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
        Schema::drop('option_selections');
    }
}
