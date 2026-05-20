<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('category', ['standard','deluxe','suite','villa','dormitory'])->default('standard');
            $table->enum('bed_type', ['single','double','queen','king','twin','bunk'])->default('double');
            $table->enum('view_type', ['city','garden','pool','ocean','mountain','none'])->default('none');
            $table->integer('total_rooms')->default(1);
            $table->integer('max_adults')->default(2);
            $table->integer('max_children')->default(1);
            $table->decimal('size_sqm', 6, 2)->nullable();
            $table->integer('floor')->nullable();
            $table->decimal('base_rate', 10, 2)->default(0);
            $table->decimal('weekend_rate', 10, 2)->nullable();
            $table->decimal('extra_adult_charge', 8, 2)->default(0);
            $table->decimal('extra_child_charge', 8, 2)->default(0);
            $table->decimal('tax_rate', 5, 2)->default(0);
            $table->boolean('breakfast')->default(false);
            $table->integer('min_stay')->default(1);
            $table->integer('max_stay')->nullable();
            $table->text('description')->nullable();
            $table->enum('status', ['active','inactive'])->default('active');
            $table->json('amenities')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};