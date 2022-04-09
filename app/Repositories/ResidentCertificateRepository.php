<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ResidentCertificateRepositoryInterface;
use App\Models\Residents\ResidentCertificate as Model;
use App\Repositories\ResidentRecordRepository;

use Carbon\Carbon;
use Mail;

class ResidentCertificateRepository implements ResidentCertificateRepositoryInterface
{
    protected $model;
    protected $modelRelationships = ['resident_record'];
    protected $residentRecordRepository;

    public function __construct(
        Model $model,
    ResidentRecordRepository $residentRecordRepository
    )
    {
        $this->model = $model;
        $this->residentRecordRepository = $residentRecordRepository;
    }

    public function baseModel()
    {
        return $this->model->with($this->modelRelationships);
    }

    public function getAll($query)
    {
        try
        {
            return $this->baseModel()
            ->orderBy('id', 'DESC')->get();
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function getById($id)
    {
        try
        {
            return $this->baseModel()->findOrFail($id);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function create($payload, $pdfFile)
    {
        try
        {
            $fileYear = Carbon::now()->year;
            $filename = $fileYear.'-'.$pdfFile->getClientOriginalName();
            $certificatePdfFilesDir = '/files/pdfs/certificates';
            $pdfFile->move(public_path($certificatePdfFilesDir), $filename);
            $uploadedFileDir = env('APP_URL').$certificatePdfFilesDir.'/'.$filename;



            return $this->baseModel()->create([
                'resident_record_id' => $payload['resident_record_id'],
                'purpose' => $payload['purpose'],
                'type' => $payload['type'],
                'file_directory' => $uploadedFileDir,
            ]);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function updateById($id, $payload)
    {
        try
        {
            // $resident = $this->residentRecordRepository->getById($payload['resident_record_id']);
            // $residentName = $resident->first_name.' '.$resident->last_name;

            // Mail::raw("Good day, {$residentName} your certificate for {$payload['type']} been created and ready for pick-up", function($message) use($resident) {
            //     $message->from('pitogo-portal@no-reply.com', 'BRGY.PITOGO PORTAL SYSTEM');
            //     $message->subject('BRGY.PITOGO - CERTIFICATE READY FOR PICK-UP');
            //     $message->to($resident->email);
            // });

            return $this->baseModel()->findOrFail($id)->update($payload);
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        try
        {
            return $this->baseModel()->findOrFail($id)->delete();
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
