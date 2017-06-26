<?php

namespace App\Services\v1;

use App\Batch;
use App\Drug;
use App\Box;
use Illuminate\Support\Str;

class BatchesService {

    public function getBatches() {
        return $this->filterBatches(Batch::all());
    }

    protected function filterBatches($batches) {
        $data = [];

        foreach ($batches as $batch) {
            $entry = [
                'id' => $batch->id,
                'dosage' => $batch->dosage,
                'DLU' => $batch->DLU,
                'drug' => $batch->drug->where('id', $batch->drug_id)->first(),
                'box' => $batch->box->where('id', $batch->box_id)->first(),
                'orders' => $batch->orders,
                'quantity' => $batch->quantity,
                'dotationU7' => $batch->dotationU7,
                'created_at' => $batch->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $batch->updated_at->format('Y-m-d H:i:s'),
                'href' => route('batches.show', ['id' => $batch->id])
            ];

            $data[] = $entry;
        }

        return $data;
    }

    public function getBatch($batchId) {
        return $this->filterBatches(Batch::where('id', $batchId)->get());
    }

    public function createBatch($req) {
        $batch = new Batch();

        // TODO check if drug and box exists
        $batch->dosage = $req->input('dosage');
        $batch->DLU = $req->input('DLU');
        $batch->drug_id = $req->input('drug_id');
        $batch->box_id = $req->input('box_id');
        $batch->quantity = $req->input('quantity');
        $batch->dotationU7 = $req->input('dotationU7');

        $batch->save();

        return $this->filterBatches([$batch]);
    }

    public function updateBatch($req, $id) {
        $batch = Batch::where('id', $id)->firstOrFail();

        // TODO check if drug and box exists
        if ($req->input('dosage') != null) {
            $batch->dosage = $req->input('dosage');
        }

        if ($req->input('DLU') != null) {
            $batch->DLU = $req->input('DLU');
        }

        if ($req->input('drug_id') != null) {
            $batch->drug_id = $req->input('drug_id');
        }

        if ($req->input('box_id') != null) {
            $batch->box_id = $req->input('box_id');
        }

        if ($req->input('quantity') != null) {
            $batch->quantity = $req->input('quantity');
        }

        if ($req->input('dotationU7') != null) {
            $batch->dotationU7 = $req->input('dotationU7');
        }

        $batch->save();

        return $this->filterBatches([$batch]);
    }

    public function deleteBatch($id) {
        $batch = Batch::where('id', $id)->firstOrFail();
        $batch->delete();
    }
}