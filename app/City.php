<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;

class City extends Model
{
    protected $fillable = [
        'name',
    ];
    public function areas()
    {
        return $this->hasMany('App\Area', 'city_id', 'id');
    }
}