<?php
// ══════════════════════════════════════════════════════════
// FILE: app/Models/Property.php
// ══════════════════════════════════════════════════════════
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Property extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'name', 'type', 'star_rating', 'city', 'country',
        'address', 'email', 'phone', 'website', 'description',
        'check_in_time', 'check_out_time', 'total_rooms',
        'currency', 'status', 'amenities', 'latitude', 'longitude',
    ];
 
    protected $casts = [
        'amenities' => 'array',  // JSON stored as array
    ];
 
    // One property has many rooms
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
 
    // One property has many OTA channels
    public function channels()
    {
        return $this->hasMany(Channel::class);
    }
 
    // One property has many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

