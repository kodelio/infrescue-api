<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    public function batches() {
        return $this->hasMany('App\Batch');
    }

    public function dci() {
        return $this->belongsTo('App\Dci');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
