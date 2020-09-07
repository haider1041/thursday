<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\City;
use App\Brand_location;
use App\Schedule;

class Area extends Model
{
    //
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
    public function city()
    {
        return $this->belongsTo('App\City');
    }
    public function brand_locations()
    {
        return $this->hasMany('App\Brand_location', 'area_id', 'id');
    }
    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'area_id', 'id');
    }
}