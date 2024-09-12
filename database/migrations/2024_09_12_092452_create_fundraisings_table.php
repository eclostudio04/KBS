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
        Schema::create('fundraising', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fundraisers_id')->constrained()->onDelete('cascade');
            $table->foreignId('categories_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail');
            $table->text('about');
            $table->boolean('is_active');
            $table->boolean('has_finished');
            $table->unsignedBigInteger('target_amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraising');
    }
};