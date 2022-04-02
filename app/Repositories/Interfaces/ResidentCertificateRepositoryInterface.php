<?php

namespace App\Repositories\Interfaces;

interface ResidentCertificateRepositoryInterface
{
    public function getAll($query);

    public function getById($id);

    public function create($payload, $pdfFile);

    public function updateById($id, $payload);

    public function deleteById($id);
}
