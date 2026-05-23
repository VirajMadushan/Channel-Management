<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('channel_id')->nullable()->constrained()->onDelete('cascade');
            $table->date('date');
            $table->decimal('rate', 10, 2);
            $table->integer('available_rooms')->default(1);
            $table->boolean('is_closed')->default(false);
            $table->integer('min_stay')->default(1);
            $table->timestamps();

            $table->unique(['room_id', 'channel_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
