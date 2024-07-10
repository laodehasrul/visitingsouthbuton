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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->longText('content');
            $table->string('image_featured');
            $table->integer('viewer')->nullable()->default(0);
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('berita_comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignid('berita_comment_id')->nullable();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('berita_id')->constrained('beritas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('berita_like_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('berita_comment_id')->constrained('berita_comments')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita_like_comments');
        Schema::dropIfExists('berita_comments');
        Schema::dropIfExists('beritas');
    }
};
