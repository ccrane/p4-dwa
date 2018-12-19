<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Winery extends Model
{
    use SoftDeletes;

    protected $table = 'wineries';
    protected $dates = ['deleted_at'];

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function region()
    {
        return $this->belongsTo('App\Region');
    }

    public function wines() {
        return $this->hasMany('App\Wine');
    }
}
