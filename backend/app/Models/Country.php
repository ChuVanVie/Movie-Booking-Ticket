<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
        'slug'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->country_name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->country_name);
        });
    }

    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
