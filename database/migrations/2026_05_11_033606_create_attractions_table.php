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
        Schema::create('attractions', function (Blueprint $table) {

            $table->id();

            // INFORMASI DASAR
            $table->string('name');

            $table->string('slug')->unique();

            $table->string('excerpt');

            $table->longText('description');

            // KATEGORI
            $table->string('category');

            // INFO TAMBAHAN
            $table->string('location_label')->nullable();

            $table->string('special_badge')->nullable();

            // OPERASIONAL
            $table->string('operational_days')->nullable();

            $table->string('open_time')->nullable();

            $table->string('close_time')->nullable();

            $table->string('ticket_price')->nullable();

            // FASILITAS
            $table->text('facilities')->nullable();

            // GOOGLE MAPS
            $table->string('google_maps_url')->nullable();

            // FOTO COVER
            $table->string('main_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};