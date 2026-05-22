<?php

namespace App\Services;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;

class ReservationService
{
    public function checkAvailability($roomId, $checkIn, $checkOut): bool
    {
        return !Reservation::where('room_id', $roomId)

            ->whereIn('status', [
                'pending',
                'confirmed',
                'checked_in'
            ])

            ->where(function ($query) use ($checkIn, $checkOut) {

                $query->whereBetween('check_in', [$checkIn, $checkOut])

                    ->orWhereBetween('check_out', [$checkIn, $checkOut])

                    ->orWhere(function ($q) use ($checkIn, $checkOut) {

                        $q->where('check_in', '<=', $checkIn)
                          ->where('check_out', '>=', $checkOut);
                    });

            })

            ->exists();
    }

    public function calculateNights($checkIn, $checkOut): int
    {
        return Carbon::parse($checkIn)
            ->diffInDays(Carbon::parse($checkOut));
    }

    public function calculateTotal(Room $room, int $nights): float
    {
        return $room->base_price * $nights;
    }

    public function generateBookingId(): string
    {
        return 'RES-' . now()->format('YmdHis');
    }
}