<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dci extends Model
{
    public function drugs() {
        return $this->hasMany('App\Drug');
    }
}
