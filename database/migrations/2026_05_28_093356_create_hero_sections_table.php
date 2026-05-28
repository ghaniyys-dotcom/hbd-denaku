<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('section_key')->unique();          // e.g. hero_center, hero_left, hero_right, hero_title, hero_subtitle
            $table->string('title')->nullable();               // Display title
            $table->text('content')->nullable();               // Text content
            $table->string('image_path')->nullable();          // Image file path
            $table->string('caption')->nullable();             // Image caption
            $table->string('emoji')->nullable();               // Emoji icon
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
