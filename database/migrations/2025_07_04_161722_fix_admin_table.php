<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::dropIfExists('admin');
    Schema::create('admin', function (Blueprint $table) {
        $table->bigIncrements('id_admin');
        $table->string('username');
        $table->string('email')->unique();
        $table->string('foto_profil')->nullable();
        $table->string('role')->default('Admin HydroGami');
        $table->string('password');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
