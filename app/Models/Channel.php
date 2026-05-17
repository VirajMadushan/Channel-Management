<?php
// ══════════════════════════════════════════════════════════
// FILE: app/Models/Channel.php
// ══════════════════════════════════════════════════════════
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'property_id', 'ota_name', 'display_name', 'hotel_id',
        'api_key', 'commission_rate', 'status',
        'sync_availability', 'sync_rates', 'receive_reservations',
        'sync_frequency', 'last_synced_at',
    ];
 
    protected $casts = [
        'sync_availability'    => 'boolean',
        'sync_rates'           => 'boolean',
        'receive_reservations' => 'boolean',
        'last_synced_at'       => 'datetime',
    ];
 
    // Never expose api_key in JSON responses
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
}