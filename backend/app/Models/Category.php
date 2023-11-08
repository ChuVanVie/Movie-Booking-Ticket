<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->category_name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->category_name);
        });
    }

    public function movies(){
        return $this->belongsToMany(Movie::class, 'movies_categories', 'category_id');
    }
}
