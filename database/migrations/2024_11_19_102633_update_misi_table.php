<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMisiTable extends Migration
{
    public function up()
    {
        Schema::table('misi', function (Blueprint $table) {
            $table->integer('id_admin')->nullable(); // Foreign Key for admin
            $table->string('status_misi')->default('pending'); // New column for status
            $table->dropColumn('new_column_name'); // Drop unused column if exists
        });
    }

    public function down()
    {
        Schema::table('misi', function (Blueprint $table) {
            $table->dropColumn(['id_admin', 'status_misi']);
            $table->string('new_column_name')->nullable();
        });
    }
}
