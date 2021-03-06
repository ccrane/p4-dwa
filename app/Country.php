<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;

    protected $table = 'countries';
    protected $dates = ['deleted_at'];

    public function regions() {
        return $this->hasMany('App\Region');
    }

    public function wineries() {
        return $this->hasMany('App\Winery');
    }

    public function wines() {
        return $this->hasMany('App\Wine');
    }
}
