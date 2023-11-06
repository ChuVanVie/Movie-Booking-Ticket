<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'category_id',
        'country_id',
        'duration',
        'year',
        'decs',
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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
