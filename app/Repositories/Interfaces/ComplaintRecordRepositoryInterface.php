<?php

namespace App\Repositories\Interfaces;

interface ComplaintRecordRepositoryInterface
{
    public function getAll($query);

    public function getById($id);

    public function create($payload, $evidenceFile);

    public function updateById($id, $payload);

    public function deleteById($id);
}
