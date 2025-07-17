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
    Schema::table('microsites', function (Blueprint $table) {
        $table->string('admin_url')->nullable();
        $table->string('editor_url')->nullable();
        $table->string('public_url')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('microsites', function (Blueprint $table) {
        $table->dropColumn(['admin_url', 'editor_url', 'public_url']);
    });
}
};
