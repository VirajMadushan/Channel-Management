<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->enum('ota_name', ['booking_com', 'expedia', 'airbnb', 'agoda', 'hotels_com', 'trivago', 'direct']);
            $table->string('display_name');
            $table->string('hotel_id')->nullable();
            $table->text('api_key')->nullable();
            $table->decimal('commission_rate', 5, 2)->default(0);
            $table->enum('status', ['active', 'inactive', 'pending'])->default('pending');
            $table->boolean('sync_availability')->default(true);
            $table->boolean('sync_rates')->default(true);
            $table->boolean('receive_reservations')->default(true);
            $table->enum('sync_frequency', ['realtime', 'hourly', 'daily'])->default('hourly');
            $table->timestamp('last_synced_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('channels');
    }
};
