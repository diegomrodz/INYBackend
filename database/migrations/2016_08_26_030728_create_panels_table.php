<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panels', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('device_id')->nullable(false);
            $table->unsignedInteger('patient_id')->nullable(false);
            $table->unsignedInteger('parent_id')->nullable(true);

            $table->unsignedInteger('left_option_id')->nullable(true);
            $table->unsignedInteger('right_option_id')->nullable(true);
            
            $table->string('down_option')->nullable(true);

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
        Schema::drop('panels');
    }
}
