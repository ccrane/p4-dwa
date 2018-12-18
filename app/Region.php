<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function region() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function subregions() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function regions() {
        return $this->subregions()->with('regions');
    }
}
