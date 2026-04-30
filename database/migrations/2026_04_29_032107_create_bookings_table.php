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
        Schema::create('bookings', function (Blueprint $table) {
        $table->id();

        $table->string('order_id')->unique();
        $table->string('name');
        $table->string('phone');
        $table->string('email')->nullable();

        $table->string('package_name');
        $table->integer('package_price');

        $table->date('date');
        $table->integer('pax');

        $table->text('message')->nullable();

        $table->enum('status', ['pending', 'confirmed', 'cancelled'])
        ->default('pending');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
