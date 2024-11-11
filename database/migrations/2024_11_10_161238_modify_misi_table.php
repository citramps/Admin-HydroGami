<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('misi', function (Blueprint $table) {
        $table->string('new_column_name')->nullable();
    });
}

public function down()
{
    Schema::table('misi', function (Blueprint $table) {
        $table->dropColumn('new_column_name');
    });
}
};
