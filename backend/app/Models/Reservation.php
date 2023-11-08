<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'showtime_id',
        'seat_ids',
        'ticket_code',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id');
    }

    public function paymentHistories(){
        return $this->hasMany(PaymentHistory::class);
    }

}
