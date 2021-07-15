<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldBombTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_bomb_tests', function (Blueprint $table) {
            $table->id();
            $table->string('hours');
            $table->integer('minute');
            $table->integer('accumulated');
            $table->integer('instant_measurement');
            $table->integer('water_column');
            $table->float('pressure_psi');
            $table->integer('measured_from_edge');
            $table->string('temperature')->nullable();
            $table->string('ph')->nullable();
            $table->string('conduct')->nullable();
            $table->string('ppm')->nullable();
            $table->string('tds')->nullable();
            $table->string('turbidity')->nullable();
            $table->string('observation')->nullable();
            $table->unsignedInteger('bomb_test_id');
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
        Schema::dropIfExists('field_bomb_tests');
    }
}
