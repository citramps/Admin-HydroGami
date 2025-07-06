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
        Schema::create('panduan', function (Blueprint $table) {
            $table->id('id_panduan');
            $table->unsignedBigInteger('id_admin');
            $table->string('gambar', 255);
            $table->string('video', 255);
            $table->string('judul', 255);
            $table->text('desk_panduan');
            $table->timestamps(); // Membuat created_at dan updated_at
            
            // Foreign key constraint
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('panduan');
    }
};