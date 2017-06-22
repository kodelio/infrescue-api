<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    public function drug() {
        return $this->belongsTo('App\Drug');
    }

    public function box() {
        return $this->belongsTo('App\Box');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }
}
