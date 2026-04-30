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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->text('excerpt');
            $table->longText('content');
            $table->string('image')->nullable();
            $table->text('image_caption')->nullable();
            $table->text('quote_text')->nullable();
            $table->string('quote_author')->nullable();
            $table->boolean('has_event')->default(false);
            $table->string('event_date')->nullable();
            $table->string('event_time')->nullable();
            $table->string('event_location')->nullable();
            $table->string('event_price')->nullable();
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};