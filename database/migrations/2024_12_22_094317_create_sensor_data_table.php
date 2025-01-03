<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorDataTable extends Migration
{
    public function up()
    {
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->double('temperature', 8, 2);
            $table->double('humidity', 8, 2);
            $table->double('light', 8, 2);
            $table->double('soil_moisture', 8, 2);
            $table->integer('tds');
            $table->double('ph', 8, 3);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sensor_data');
    }
}
