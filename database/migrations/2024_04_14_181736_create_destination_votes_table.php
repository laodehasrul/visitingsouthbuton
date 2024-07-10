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
        Schema::create('destination_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('destination_id')->constrained('destinations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_votes');
    }
};
