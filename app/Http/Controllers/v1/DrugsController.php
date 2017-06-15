<?php

namespace App\Http\Controllers\v1;

use App\Services\v1\DrugsService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class DrugsController extends Controller
{
    public function __construct(DrugsService $service)
    {
        $this->drugs = $service;
        $this->middleware('auth:api', ['only' => ['store', 'update', 'destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parameters = request()->input();
        $data = $this->drugs->getDrugs($parameters);
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $drug = $this->drugs->createDrug($request);
            return response()->json($drug, 201);
        }
        catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->drugs->getDrug($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $drug = $this->drugs->updateDrug($request, $id);
            return response()->json($drug, 200);
        }
        catch (ModelNotFoundException $ex) {
            throw $ex;
        }
        catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $drug = $this->drugs->deleteDrug($id);
            return response()->make('', 204);
        }
        catch (ModelNotFoundException $ex) {
            throw $ex;
        }
        catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
