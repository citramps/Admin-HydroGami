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
        Schema::create('misi', function (Blueprint $table) {
            $table->id('id_misi');
            $table->unsignedBigInteger('id_admin');
            $table->string('nama_misi', 255);
            $table->text('deskripsi_misi');
            $table->enum('status_misi', ['aktif', 'tidak aktif']);
            $table->enum('tipe_misi', ['harian', 'mingguan']);
            $table->integer('poin');
            $table->timestamps(); // ini akan membuat created_at dan updated_at
            
            // Foreign key constraint
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('misi');
    }
};