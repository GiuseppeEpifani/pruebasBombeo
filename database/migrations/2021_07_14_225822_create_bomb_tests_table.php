<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBombTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bomb_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->string('hours_init');
            $table->string('well_depth');
            $table->string('water_well');
            $table->string('client');
            $table->string('ubication');
            $table->string('well_diameter');
            $table->string('proof');
            $table->string('flow');
            $table->string('supervisor');
            $table->integer('tube_aforo');
            $table->integer('disk_aforo');
            $table->integer('meters_well');
            $table->string('latitude');
            $table->string('logitude');
            $table->string('pump_model');
            $table->integer('suction_distance');
            $table->unsignedInteger('user_id');
            $table->softDeletes();
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
        Schema::dropIfExists('bomb_tests');
    }
}
