<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PatientFugullinColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->unsignedInteger('mental_health_id')->nullable(true);
            $table->unsignedInteger('oxygenation_id')->nullable(true);
            $table->unsignedInteger('vital_sign_id')->nullable(true);
            $table->unsignedInteger('motility_id')->nullable(true);
            $table->unsignedInteger('alimentation_id')->nullable(true);
            $table->unsignedInteger('movimentation_id')->nullable(true);
            $table->unsignedInteger('body_care_id')->nullable(true);
            $table->unsignedInteger('evacuation_id')->nullable(true);
            $table->unsignedInteger('therapy_id')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn('mental_health_id');
            $table->dropColumn('oxygenation_id');
            $table->dropColumn('vital_sign_id');
            $table->dropColumn('motility_id');
            $table->dropColumn('alimentation_id');
            $table->dropColumn('movimentation_id');
            $table->dropColumn('body_care_id');
            $table->dropColumn('evacuation_id');
            $table->dropColumn('therapy_id');
        });
    }
}
