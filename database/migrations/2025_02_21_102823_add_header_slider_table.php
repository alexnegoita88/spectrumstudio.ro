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
        Schema::create('header_slider', function (Blueprint $table) {
            $table->id();

            $table->string('h1_title')->nullable();
            $table->string('h2_title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('cta_link')->nullable();
            $table->string('cta_name')->nullable();
            $table->json('images');
            $table->string('effect')->default('slide');
            $table->boolean('is_active')->default(0);

            $table->timestamps();
        });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_slider');
    }
};
