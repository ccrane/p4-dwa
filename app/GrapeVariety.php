<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrapeVariety extends Model
{
    use SoftDeletes;

    protected $table = 'grape_varieties';
    protected $dates = ['deleted_at'];

    public function wines() {
        return $this->hasMany('App\Wine');
    }
}
