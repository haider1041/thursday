<?php

namespace App;

use App\User;
use App\Area;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function area()
    {
        return $this->belongsTo('App\Area', 'area_id', 'id');
    }
}