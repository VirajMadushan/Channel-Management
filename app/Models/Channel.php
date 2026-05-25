<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'ota_name', 'display_name', 'hotel_id',
        'api_key', 'commission_rate', 'status', 'sync_availability',
        'sync_rates', 'receive_reservations', 'sync_frequency',
        'last_synced_at',
    ];

    protected $casts = [
        'sync_availability'    => 'boolean',
        'sync_rates'           => 'boolean',
        'receive_reservations' => 'boolean',
        'last_synced_at'       => 'datetime',
    ];

    // Never show API key in JSON responses
    protected $hidden = ['api_key'];

    // Channel belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Channel has many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // Helper — OTA logo icon based on name
    public function otaLogo()
    {
        return match($this->ota_name) {
            'booking_com' => '🔵',
            'expedia'     => '🟡',
            'airbnb'      => '🔴',
            'agoda'       => '🟢',
            'hotels_com'  => '🟠',
            'trivago'     => '🔷',
            'direct'      => '🏨',
            default       => '🌐',
        };
    }

    // Helper — status badge color
    public function statusColor()
    {
        return match($this->status) {
            'active'   => 'success',
            'inactive' => 'danger',
            'pending'  => 'warning',
            default    => 'secondary',
        };
    }
}