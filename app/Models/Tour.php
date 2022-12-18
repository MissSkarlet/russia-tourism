<?php

namespace App\Models;

use App\Models\City;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';

    public function start_city()
    {
        return $this->belongsTo(City::class, 'start_city_id');
    }

    public function finish_city()
    {
        return $this->belongsTo(City::class, 'finish_city_id');
    }
}
