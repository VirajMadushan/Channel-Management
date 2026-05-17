<?php
// ══════════════════════════════════════════════════════════
// FILE: app/Models/Rate.php
// ══════════════════════════════════════════════════════════
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Rate extends Model
{
    use HasFactory;
 
    protected $fillable = [
        'room_id', 'channel_id', 'date',
        'rate', 'available_rooms', 'is_closed', 'min_stay',
    ];
 
    protected $casts = [
        'date'      => 'date',
        'is_closed' => 'boolean',
    ];
 
    // Rate belongs to a room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
 
    // Rate belongs to a channel
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}