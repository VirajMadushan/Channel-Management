<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->string('booking_id')->unique();

            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->foreignId('room_id')->constrained()->onDelete('cascade');
            $table->foreignId('channel_id')->nullable()->constrained()->onDelete('set null');

            $table->string('guest_name');
            $table->string('guest_email')->nullable();
            $table->string('guest_phone')->nullable();
            $table->string('guest_country')->nullable();

            $table->date('check_in');
            $table->date('check_out');

            $table->time('arrival_time')->nullable();

            $table->integer('nights');

            $table->integer('adults')->default(1);
            $table->integer('children')->default(0);

            $table->decimal('room_rate', 10, 2);
            $table->decimal('total_amount', 10, 2);

            $table->decimal('commission_amount', 10, 2)->default(0);
            $table->decimal('net_amount', 10, 2);

            $table->string('currency', 3)->default('USD');

            $table->enum('payment_status', [
                'unpaid',
                'partial',
                'paid',
                'refunded',
            ])->default('unpaid');

            $table->enum('status', [
                'pending',
                'confirmed',
                'checked_in',
                'checked_out',
                'cancelled',
                'no_show',
            ])->default('pending');

            $table->enum('booking_source', [
                'direct',
                'booking_com',
                'airbnb',
                'agoda',
                'expedia',
            ])->default('direct');

            $table->text('special_requests')->nullable();
            $table->text('internal_notes')->nullable();

            $table->string('ota_booking_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->index([
                'room_id',
                'check_in',
                'check_out',
                'status',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
