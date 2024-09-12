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
        Schema::create('fundraisingwithdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fundraisings_id')->constrained()->onDelete('cascade');
            $table->foreignId('fundraisers_id')->constrained()->onDelete('cascade');
            $table->boolean('has_received');
            $table->boolean('has_set');
            $table->unsignedBigInteger('amount_requested');
            $table->unsignedBigInteger('amount_received');
            $table->string('bank_name');
            $table->string('bank_account_name');
            $table->string('bank_account_number');
            $table->string('proof');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fundraisingwithdrawals');
    }
};