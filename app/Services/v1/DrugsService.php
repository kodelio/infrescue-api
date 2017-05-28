<?php

namespace App\Services\v1;

use App\Drug;
use App\Dci;
use App\Category;
use Illuminate\Support\Str;

class DrugsService {

    public function getDrugs($parameters) {
        if (isset($parameters) && !empty($parameters)) {
            if (isset($parameters['name'])) {

                $drugs = Drug::all();
                $drugsSearch = new \Illuminate\Database\Eloquent\Collection();

                foreach($drugs as $drug)
                {
                    if(Str::contains(Str::lower($drug->name), Str::lower($parameters['name']))) {
                        $drugsSearch->add($drug);
                    }
                }
                return $drugsSearch;
            }
        }
        else {
            return $this->filterDrugs(Drug::all());
        }
    }

    public function getDrug($drugId) {
        return $this->filterDrugs(Drug::where('id', $drugId)->get());
    }

    protected function filterDrugs($drugs) {
        $data = [];

        foreach ($drugs as $drug) {
            $entry = [
                'id' => $drug->id,
                'name' => $drug->name,
                'dci' => $drug->dci->where('id', $drug->dci_id)->get(),
                'category' => $drug->category->where('id', $drug->category_id)->get(),
                'created_at' => $drug->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $drug->updated_at->format('Y-m-d H:i:s'),
                'href' => route('drugs.show', ['id' => $drug->id])
            ];

            $data[] = $entry;
        }

        return $data;
    }

    public function createDrug($req) {
        $drug = new Drug();

        $drug->name = $req->input('name');
        $drug->dci_id = $req->input('dci_id');
        $drug->category_id = $req->input('category_id');

        $drug->save();

        return $this->filterDrugs([$drug]);
    }
}