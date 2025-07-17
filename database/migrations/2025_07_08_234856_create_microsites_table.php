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
    Schema::create('microsites', function (Blueprint $table) {
        $table->id();
        $table->string('domain_name');
        $table->string('site_id')->nullable(); // WPCS site ID
        $table->enum('status', ['pending', 'active', 'error'])->default('pending');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('microsites');
    }
};
