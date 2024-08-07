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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade');
            $table->string('feedbackState')->default('New');
            $table->enum('platform', ['iOS', 'Android', 'Windows', 'macOS', 'Linux']);
            $table->string('version');
            $table->enum('category', ['bug', 'suggestion', 'praise', 'inquiry']);
            $table->string('content', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
