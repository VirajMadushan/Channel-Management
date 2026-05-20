<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', 'property_id', 'room_id', 'channel_id',
        'guest_name', 'guest_email', 'guest_phone', 'guest_country',
        'check_in', 'check_out', 'nights', 'adults', 'children',
        'room_rate', 'total_amount', 'commission_amount', 'net_amount',
        'currency', 'status', 'special_requests', 'ota_booking_id',
    ];

    protected $casts = [
        'check_in'  => 'date',
        'check_out' => 'date',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function statusColor()
    {
        return match($this->status) {
            'confirmed'   => 'success',
            'pending'     => 'warning',
            'checked_in'  => 'info',
            'checked_out' => 'secondary',
            'cancelled'   => 'danger',
            default       => 'primary',
        };
    }
}