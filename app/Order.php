<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function batch() {
        return $this->belongsTo('App\Batch');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
