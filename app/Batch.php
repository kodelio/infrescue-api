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
}
