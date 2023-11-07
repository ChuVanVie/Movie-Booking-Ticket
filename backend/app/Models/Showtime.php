<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'movie_id',
        'theater_id',
        'start_time',
        'end_time',
    ];

    public function movie(){
        return $this->belongsTo(movie::class, 'movie_id');
    }

    public function theater(){
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }
}
