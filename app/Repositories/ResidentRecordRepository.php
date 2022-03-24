<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ResidentRecordRepositoryInterface;
use App\Models\Residents\ResidentRecord as Model;

use App\Http\Resources\ResidentRecordsResource;

class ResidentRecordRepository implements ResidentRecordRepositoryInterface
{
    protected $model;
    protected $modelRelationships = ['resident_certificates'];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll($query)
    {
        try
        {

        }
        catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function getById($id)
    {

    }

    public function create($payload)
    {

    }

    public function updateById($id, $payload)
    {

    }

    public function deleteById($id)
    {

    }
}
