<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function region() {
        return $this->belongsTo('App\Region');
    }

    public function winery() {
        return $this->belongsTo('App\Winery');
    }

    public function type() {
        return $this->belongsTo('App\WineType');
    }

    public function variety() {
        return $this->belongsTo('App\GrapeVariety');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }

    public function latestReview() {
        return $this->hasOne('App\Review')->latest();
    }

}
