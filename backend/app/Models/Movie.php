<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'movie_name',
        'slug',
        'country_id',
        'duration',
        'year',
        'desc',
        'premiere_date',
        'rating',
        'thumb_url',
        'poster_url',
        'trailer_url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->movie_name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->movie_name);
        });
    }

    public function categories(){
        return $this->belongsToMany(Category::class, 'categories_of_movies', 'movie_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }

    public function rates(){
        return $this->hasMany(Rate::class);
    }
}
