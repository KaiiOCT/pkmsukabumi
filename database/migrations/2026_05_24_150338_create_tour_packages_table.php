<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();

            $table->string('title_line1');
            $table->string('title_line2');
            $table->string('catchphrase');
            $table->string('location_label');

            $table->text('quote')->nullable();
            $table->longText('description');

            $table->string('duration')->nullable();
            $table->string('group_size')->nullable();
            $table->string('guide')->nullable();
            $table->string('activity_type')->nullable();

            $table->bigInteger('price');
            $table->bigInteger('price_strike')->nullable();

            $table->integer('slots_left')->nullable();

            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->string('category')->nullable();

            $table->text('included')->nullable();
            $table->text('excluded')->nullable();

            $table->string('main_image');

            $table->json('gallery')->nullable();

            $table->json('itinerary')->nullable();

            $table->boolean('is_bestseller')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};