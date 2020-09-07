<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brand;
use App\Area;

class Brand_location extends Model
{
    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }
    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id', 'id');
    }
}