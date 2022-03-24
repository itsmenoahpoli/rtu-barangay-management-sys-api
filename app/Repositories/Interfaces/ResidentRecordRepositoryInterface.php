<?php

namespace App\Repositories\Interfaces;

interface ResidentRecordRepositoryInterface
{
    public function getAll($query);

    public function getById($id);
}
