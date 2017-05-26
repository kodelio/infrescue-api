<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function batches() {
        return $this->hasMany('App\Batch');
    }
}
