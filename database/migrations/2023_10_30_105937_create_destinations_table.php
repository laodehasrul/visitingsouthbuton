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
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('address')->nullable();
            $table->string('slug')->unique();
            $table->longText('description');
            $table->longText('content');
            $table->string('image_featured')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('viewer')->nullable()->default(0);
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('category_id')->constrained('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('destination_comments', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignid('destination_comment_id')->nullable();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('destination_id')->constrained('destinations')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
        Schema::create('destination_like_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('destination_comment_id')->constrained('destination_comments')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destination_like_comments');
        Schema::dropIfExists('destination_comments');
        Schema::dropIfExists('destinations');
    }
};
