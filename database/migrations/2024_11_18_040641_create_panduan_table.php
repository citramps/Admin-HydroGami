<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanduanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panduan', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('judul_panduan'); // Kolom untuk judul panduan
            $table->text('deskripsi'); // Kolom untuk deskripsi
            $table->string('gambar')->nullable(); // Kolom untuk gambar (opsional)
            $table->string('video')->nullable(); // Kolom untuk URL video (opsional)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panduan');
    }
}
