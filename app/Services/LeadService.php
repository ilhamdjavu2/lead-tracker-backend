<?php

namespace App\Services;

use App\Repositories\Interfaces\LeadRepositoryInterface;
use Illuminate\Support\Facades\DB;
use App\Enums\LeadStatus;

class LeadService
{
    protected $repo;

    public function __construct(LeadRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function getLeads($request)
    {
        return $this->repo->getAll($request);
    }

    public function createLead(array $data)
    {
		return DB::transaction(function () use ($data) {
			$data['status'] = $data['status'] ?? LeadStatus::NEW;
			
			return $this->repo->create($data);
		});
    }

    public function updateLead($id, array $data)
    {
		return DB::transaction(function () use ($id, $data) {
			$lead = $this->repo->update($id, $data);
			if (!$lead) {
				abort(404, 'Lead not found');
			}

			return $lead;
		});
    }

    public function deleteLead($id)
    {
        return DB::transaction(function () use ($id) {
			$deleted = $this->repo->delete($id);
			if (!$deleted) {
				abort(404, 'Lead not found');
			}

			return true;
		});
    }
}
