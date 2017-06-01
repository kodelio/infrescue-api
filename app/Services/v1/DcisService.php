<?php

namespace App\Services\v1;

use App\Dci;
use Illuminate\Support\Str;

class DcisService {

    public function getDcis($parameters) {
        if (isset($parameters) && !empty($parameters)) {
            if (isset($parameters['name'])) {

                $dcis = Dci::all();
                $dcisSearch = new \Illuminate\Database\Eloquent\Collection();

                foreach($dcis as $dci)
                {
                    if(Str::contains(Str::lower($dci->name), Str::lower($parameters['name']))) {
                        $dcisSearch->add($dci);
                    }
                }
                return $dcisSearch;
            }
        }
        else {
            return $this->filterDcis(Dci::all());
        }
    }

    protected function filterDcis($dcis) {
        $data = [];

        foreach ($dcis as $dci) {
            $entry = [
                'id' => $dci->id,
                'name' => $dci->name,
                'created_at' => $dci->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $dci->updated_at->format('Y-m-d H:i:s'),
                'href' => route('dcis.show', ['id' => $dci->id])
            ];

            $data[] = $entry;
        }

        return $data;
    }

    public function getDci($dciId) {
        return $this->filterDcis(Dci::where('id', $dciId)->get());
    }

    public function createDci($req) {
        $dci = new Dci();

        $dci->name = $req->input('name');

        $dci->save();

        return $this->filterDcis([$dci]);
    }

    public function updateDci($req, $id) {
        $dci = Dci::where('id', $id)->firstOrFail();

        if ($req->input('name') != null) {
            $dci->name = $req->input('name');
        }

        $dci->save();

        return $this->filterDcis([$dci]);
    }

    public function deleteDci($id) {
        $dci = Dci::where('id', $id)->firstOrFail();
        $dci->delete();
    }
}