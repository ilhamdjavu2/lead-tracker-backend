<?php

namespace App\Repositories;

use App\Models\Lead;
use App\Repositories\Interfaces\LeadRepositoryInterface;

class LeadRepository implements LeadRepositoryInterface
{
	public function getAll($request)
	{
		return Lead::query()
			->when($request['status'] ?? null, function ($q, $status) {
				$q->where('status', $status);
			})
			->when($request['name'] ?? null, function ($q, $name) {
				$q->where('name', 'like', "%{$name}%");
			})
			->when($request['email'] ?? null, function ($q, $email) {
				$q->where('email', 'like', "%{$email}%");
			})
			->when($request['phone'] ?? null, function ($q, $phone) {
				$q->where('phone', 'like', "%{$phone}%");
			});
	}

    public function findById($id)
    {
        return Lead::find($id);
    }

    public function create(array $data)
    {
        return Lead::create($data);
    }

    public function update($id, array $data)
    {
        $lead = $this->findById($id);
        if (!$lead) return null;

        $lead->update($data);
        return $lead;
    }

    public function delete($id)
    {
        $lead = $this->findById($id);
        if (!$lead) return false;

        return $lead->delete();
    }
}
