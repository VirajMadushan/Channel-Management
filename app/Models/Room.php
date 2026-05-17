<?php
// ══════════════════════════════════════════════════════════
// FILE: app/Models/Room.php
// ══════════════════════════════════════════════════════════
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Room extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'property_id', 'name', 'category', 'bed_type', 'view_type',
        'total_rooms', 'max_adults', 'max_children', 'size_sqm', 'floor',
        'base_rate', 'weekend_rate', 'extra_adult_charge', 'extra_child_charge',
        'tax_rate', 'breakfast', 'min_stay', 'max_stay',
        'description', 'status', 'amenities',
    ];
 
    protected $casts = [
        'amenities' => 'array',
    ];
 
    // Room belongs to a property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
 
    // Room has many reservations
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
 
    // Room has many rate records
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
}
 