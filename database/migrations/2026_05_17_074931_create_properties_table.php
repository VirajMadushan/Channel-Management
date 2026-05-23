<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['hotel', 'resort', 'villa', 'guesthouse', 'hostel', 'apartment'])->default('hotel');
            $table->tinyInteger('star_rating')->default(3);
            $table->string('city');
            $table->string('country');
            $table->text('address');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->text('description')->nullable();
            $table->time('check_in_time')->default('14:00:00');
            $table->time('check_out_time')->default('11:00:00');
            $table->integer('total_rooms')->default(0);
            $table->string('currency', 3)->default('USD');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->json('amenities')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
