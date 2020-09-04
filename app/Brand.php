<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
    ];

    public function areas()
    {
        return $this->hasMany('App\Area');
    }
}
