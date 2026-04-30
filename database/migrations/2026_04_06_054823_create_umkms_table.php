<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();

            // Identitas Bisnis
            $table->string('name');
            $table->string('owner_highlight');
            $table->string('slogan');
            $table->string('category');
            $table->text('description');

            // Operasional
            $table->boolean('is_open')->default(true);
            $table->time('open_time');
            $table->time('close_time');
            $table->integer('price_start');

            // Lokasi & Kontak
            $table->string('address');
            $table->string('gmaps_url')->nullable();
            $table->string('whatsapp');

            // Media
            $table->string('main_image');

            // Banyak gambar
            $table->jsonb('gallery')->nullable();

            // Daftar menu unggulan
            $table->jsonb('menu')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
