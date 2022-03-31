<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ResidentRecordRepositoryInterface;
use App\Models\Residents\ResidentRecord as Model;

use App\Http\Resources\ResidentRecordsResource;

class ResidentRecordRepository implements ResidentRecordRepositoryInterface
{
    protected $model;
    protected $modelRelationships = ['resident_files', 'resident_complaints'];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function baseModel()
    {
        return $this->model->with($this->modelRelationships);
    }

    public function getAll($query)
    {
        try
        {
            return $this->baseModel()->get();
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

    public function create($payload)
    {
        try
        {
            return $this->baseModel()->create($payload);
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
