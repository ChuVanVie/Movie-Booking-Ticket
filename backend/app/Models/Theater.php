<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cinema_id',
        'theater_name',
        'capacity',
        'status',
    ];

    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }

    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }
}
