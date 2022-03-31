<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Repositories\ResidentRecordRepository;
use App\Http\Requests\Residents\ResidentRecordRequest;

class ResidentRecordsController extends Controller
{
    protected $residentRecordRepository;

    public function __construct(ResidentRecordRepository $residentRecordRepository)
    {
        $this->residentRecordRepository = $residentRecordRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) : JsonResponse
    {
        $query = $request->query();

        return response()->json($this->residentRecordRepository->getAll($query));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResidentRecordRequest $request) : JsonResponse
    {
        return response()->json($this->residentRecordRepository->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : JsonResponse
    {
        return response()->json($this->residentRecordRepository->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) : JsonResponse
    {
        return response()->json($this->residentRecordRepository->update($id, $request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : JsonResponse
    {
        return response()->json($this->residentRecordRepository->deleteById($id));
    }
}
