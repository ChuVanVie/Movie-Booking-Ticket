<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'movie_id',
        'star',
        'comment',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
