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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->longText('content');
            $table->string('image_featured');
            $table->date('date_time')->nullable();
            $table->integer('viewer')->nullable()->default(0);
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('event_comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignid('event_comment_id')->nullable();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('event_id')->constrained('events')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('event_like_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('event_comment_id')->constrained('event_comments')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_like_comments');
        Schema::dropIfExists('event_comments');
        Schema::dropIfExists('events');
    }
};
