<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ComplaintRecordRepositoryInterface;
use App\Models\Complaints\ComplaintRecord as Model;
use App\Repositories\ResidentRecordRepository;


use Carbon\Carbon;

class ComplaintRecordRepository implements ComplaintRecordRepositoryInterface
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

    public function create($payload, $evidenceFile)
    {
        try
        {
            if ($evidenceFile)
            {
                $resident = $this->residentRecordRepository->getById($payload['resident_record_id']);
                $residentName = strtoupper($resident->first_name.'-'.$resident->last_name);

                $fileYear = Carbon::now()->year;
                $filename = $fileYear.'-'.$residentName.'-'.$evidenceFile->getClientOriginalName();

                $evidenceFilesDir = '/files/complaints/evidences';

                $evidenceFile->move(public_path($evidenceFilesDir), $filename);

                $uploadedFileDir = env('APP_URL').$evidenceFilesDir.'/'.$filename;
            }

            return $this->baseModel()->create([
                'resident_record_id' => $payload['resident_record_id'],
                'type' => $payload['type'],
                'details' => $payload['details'],
                'date_of_event' => $payload['date_of_event'],
                'evidence_file_directory' => $evidenceFile ? $uploadedFileDir : '',
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
