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

    public function parentRegion() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function region() {
        return $this->parentRegion()->with('region');
    }

    public function childRegions() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function regions() {
        return $this->childRegions()->with('regions');
    }

    public function wineries() {
        return $this->hasMany('App\Winery');
    }

    public function wines() {
        return $this->hasMany('App\Wine');
    }
}
