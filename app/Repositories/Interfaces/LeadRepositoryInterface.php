<?php

namespace App\Repositories\Interfaces;

interface LeadRepositoryInterface
{
    public function getAll($request);
    public function findById($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
