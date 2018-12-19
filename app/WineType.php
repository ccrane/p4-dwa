<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WineType extends Model
{
    use SoftDeletes;

    protected $table = 'wine_types';
    protected $dates = ['deleted_at'];

    public function wines() {
        return $this->hasMany('App\Wine');
    }
}
