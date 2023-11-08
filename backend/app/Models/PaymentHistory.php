<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reservation_id',
        'payment_date',
        'payment_method',
        'amout',
    ];

    public function reservation(){
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }
}
