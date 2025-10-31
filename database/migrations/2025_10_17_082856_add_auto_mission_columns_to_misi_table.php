<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAutoMissionColumnsToMisiTable extends Migration
{
    public function up()
    {
        Schema::table('misi', function (Blueprint $table) {
            $table->boolean('is_auto_generated')->default(false);
            $table->enum('parameter_type', ['pH', 'TDS', 'temperature', 'humidity'])->nullable();
            $table->decimal('target_value', 8, 2)->nullable();
            $table->enum('trigger_condition', ['above', 'below', 'range'])->nullable();
            $table->decimal('trigger_min_value', 8, 2)->nullable();
            $table->decimal('trigger_max_value', 8, 2)->nullable();
            $table->boolean('auto_completed')->default(false);
        });
    }

    public function down()
    {
        Schema::table('misi', function (Blueprint $table) {
            $table->dropColumn([
                'is_auto_generated',
                'parameter_type',
                'target_value',
                'trigger_condition',
                'trigger_min_value',
                'trigger_max_value',
                'auto_completed'
            ]);
        });
    }
}