<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Brand;

class Voucher extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id', 'id');
    }
}