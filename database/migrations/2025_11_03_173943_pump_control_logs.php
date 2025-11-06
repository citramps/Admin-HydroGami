<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pump_control_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('username'); // Ambil dari tabel users
            $table->string('pump_name'); // A MIX, B MIX, PH UP, PH DOWN
            $table->integer('old_value'); // nilai lama (0-100)
            $table->integer('new_value'); // nilai baru (0-100)
            $table->enum('action', ['on', 'off', 'adjust']); // Tipe action
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pump_control_logs');
    }
};