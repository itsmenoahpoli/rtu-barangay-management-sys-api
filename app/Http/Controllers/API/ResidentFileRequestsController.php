<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Controllers\PDFController;
use App\Repositories\ResidentRecordRepository;
use App\Repositories\ResidentRequestFileRepository;

class ResidentFileRequestsController extends Controller
{
    protected $pdfController;
    protected $residentRecordRepository;
    protected $residentRequestFileRepository;

    public function __construct(
        PDFController $pdfController,
        ResidentRecordRepository $residentRecordRepository,
        ResidentRequestFileRepository $residentRequestFileRepository
    )
    {
        $this->pdfController = $pdfController;
        $this->residentRecordRepository = $residentRecordRepository;
        $this->residentRequestFileRepository = $residentRequestFileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : JsonResponse
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : JsonResponse
    {
        $generatedPdfFile = $this->pdfController->generatePdf([
            'type' => $request->type,
            'resident' => $this->residentRecordRepository->getById($request->resident_id)
        ]);

        // return response()->json($generatedPdfFile);

        $residentFileRequest = $this->residentRequestFileRepository->create([
            'resident_record_id' => $request->resident_id,
            'type' => $request->type,
            'file_directory' => $generatedPdfFile['file_directory']
        ]);

        return response()->json(
            $residentFileRequest,
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) : JsonResponse
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) : JsonResponse
    {
        //
    }
}
