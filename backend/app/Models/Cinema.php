<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Cinema extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'cinema_name',
        'slug',
        'address',
        'phone'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->cinema_name);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->cinema_name);
        });
    }

    public function theaters(){
        return $this->hasMany(Theater::class);
    }

    public function showtimes(){
        return $this->hasMany(Showtime::class);
    }
}
