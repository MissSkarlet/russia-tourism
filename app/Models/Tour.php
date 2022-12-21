<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'title',
        'image',
        'description',
        'date',
        'is_popular',
        'start_city_id',
        'finish_city_id',
    ];

    protected $casts = [
        'is_popular' => 'boolean',
    ];

    public function start_city()
    {
        return $this->belongsTo(City::class, 'start_city_id');
    }

    public function finish_city()
    {
        return $this->belongsTo(City::class, 'finish_city_id');
    }
}
