<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function wine() {
        return $this->belongsTo('App\Wine');
    }

    public function user() {
        return $this->belongsTo("App\User");
    }

    public function tags() {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
