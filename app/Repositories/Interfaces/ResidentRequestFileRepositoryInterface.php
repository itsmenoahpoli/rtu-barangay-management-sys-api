<?php

namespace App\Repositories\Interfaces;

interface ResidentRequestFileRepositoryInterface
{
    public function getAll($query);

    public function getById($id);

    public function create($payload);

    public function updateById($id, $payload);

    public function deleteById($id);
}
