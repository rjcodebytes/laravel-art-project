<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('paintings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('art_type');
            $table->string('orientation');
            $table->string('dimensions')->nullable();
            $table->json('images')->nullable();
            $table->string('medium')->nullable();
            $table->string('color_palette')->nullable();
            $table->year('year_created')->nullable();
            $table->string('category')->nullable();
            $table->string('artist_name')->nullable();
            $table->string('tags')->nullable();
            $table->string('slug')->unique();
            $table->enum('status', ['public', 'private', 'draft'])->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paintings');
    }
};
