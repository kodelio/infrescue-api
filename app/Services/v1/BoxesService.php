<?php

namespace App\Services\v1;

use App\Box;
use Illuminate\Support\Str;

class BoxesService {

    public function getBoxes($parameters) {
        if (isset($parameters) && !empty($parameters) && isset($parameters['name'])) {
            $boxes = Box::all();
            $boxesSearch = new \Illuminate\Database\Eloquent\Collection();

            foreach($boxes as $box)
            {
                if(Str::contains(Str::lower($box->name), Str::lower($parameters['name'])) || Str::contains(Str::lower($box->number), Str::lower($parameters['name']))) {
                    $boxesSearch->add($box);
                }
            }
            return $boxesSearch;
        }
        return $this->filterBoxes(Box::all());
    }

    protected function filterBoxes($boxes) {
        $data = [];

        foreach ($boxes as $box) {

            $entry = [
                'id' => $box->id,
                'name' => $box->name,
                'number' => $box->number,
                'batches' => $box->batches,
                'created_at' => $box->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $box->updated_at->format('Y-m-d H:i:s'),
                'href' => route('boxes.show', ['id' => $box->id])
            ];

            for ($i = 0; $i < sizeof($entry['batches']); $i++) {
                $entry['batches'][$i]['drug'] = $entry['batches'][$i]->drug;
                for ($j = 0; $j < sizeof($entry['batches'][$i]['drug']); $j++) {
                    $entry['batches'][$i]['drug']['dci'] = $entry['batches'][$i]['drug']->dci;
                    $entry['batches'][$i]['drug']['category'] = $entry['batches'][$i]['drug']->category;
                }
            }

            $data[] = $entry;
        }
        return $data;
    }

    public function getBox($boxId) {
        return $this->filterBoxes(Box::where('id', $boxId)->get());
    }

    public function createBox($req) {
        $box = new Box();

        $box->name = $req->input('name');
        $box->number = $req->input('number');

        $box->save();

        return $this->filterBoxes([$box]);
    }

    public function updateBox($req, $id) {
        $box = Box::where('id', $id)->firstOrFail();

        if ($req->input('name') != null) {
            $box->name = $req->input('name');
        }

        if ($req->input('number') != null) {
            $box->number = $req->input('number');
        }

        $box->save();

        return $this->filterBoxes([$box]);
    }

    public function deleteBox($id) {
        $box = Box::where('id', $id)->firstOrFail();
        $box->delete();
    }
}