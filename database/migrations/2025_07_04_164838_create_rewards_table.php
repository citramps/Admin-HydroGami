<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->bigIncrements('id_reward'); // sinkron dengan model
            $table->unsignedBigInteger('id_admin');
            $table->string('tipe_reward');
            $table->string('subtipe_gacha')->nullable();
            $table->integer('koin_dibutuhkan')->nullable();
            $table->integer('jumlah')->nullable();
            $table->string('nama_reward'); // penting!
            $table->timestamps();

            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
        });

    }

    public function down()
    {
        Schema::dropIfExists('rewards');
    }
};