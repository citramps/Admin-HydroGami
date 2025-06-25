<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKoinDibutuhkanToRewardsTable extends Migration
{
    public function up()
{
    if (Schema::hasTable('rewards')) {
        Schema::table('rewards', function (Blueprint $table) {
            $table->integer('koin_dibutuhkan')->nullable()->after('subtipe_gacha');
        });
    }
}

public function down()
{
    if (Schema::hasTable('rewards')) {
        Schema::table('rewards', function (Blueprint $table) {
            $table->dropColumn('koin_dibutuhkan');
        });
    }
}
}