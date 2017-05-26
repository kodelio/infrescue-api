<?php

namespace App\Services\v1;

use App\Drug;

class DrugsService {
    public function getDrugs() {
        return Drug::all();
    }
}