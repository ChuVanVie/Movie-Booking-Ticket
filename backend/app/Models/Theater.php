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
        'state',
    ];

    public function cinema(){
        return $this->belongsTo(Cinema::class, 'cinema_id');
    }
}
