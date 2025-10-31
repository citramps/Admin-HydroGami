<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('misi', function (Blueprint $table) {
            $table->timestamp('completed_at')->nullable()->after('auto_completed');
            $table->date('expires_at')->nullable()->after('completed_at');
            $table->enum('expiry_type', ['daily', 'weekly'])->default('daily')->after('expires_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('misi', function (Blueprint $table) {
            $table->dropColumn(['completed_at', 'expires_at', 'expiry_type']);
        });
    }
};
