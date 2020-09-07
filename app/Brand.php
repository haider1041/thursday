<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;
use App\Brand_location;
use App\Voucher;


class Brand extends Model
{


    public function areas()
    {
        return $this->hasMany('App\Area', 'brand_id', 'id');
    }

    public function brand_locations()
    {
        return $this->hasMany('App\Brand_location', 'brand_id', 'id');
    }
    public function vouchers()
    {
        return $this->hasMany('App\Voucher', 'brand_id', 'id');
    }
}