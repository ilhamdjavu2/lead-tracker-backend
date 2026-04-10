<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeadService;
use App\Helpers\ApiResponse;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreLeadRequest;
use App\Http\Requests\UpdateLeadRequest;

class LeadController extends Controller
{
    protected $service;

    public function __construct(LeadService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {	
		$data = datatables($this->service->getLeads($request->all()))->toArray();
		
        return ApiResponse::success(true, 'Leads Found', $data);
    }

    public function store(StoreLeadRequest $request)
	{
		$data = $this->service->createLead($request->validated());

		return ApiResponse::success(true, 'Lead created', $data, 201);
    }

    public function update(UpdateLeadRequest $request, $id)
    {
		$data = $this->service->updateLead($id, $request->validated());

        return ApiResponse::success(true, 'Lead updated', $data);
    }

    public function destroy($id)
    {
        $deleted = $this->service->deleteLead($id);

        if (!$deleted) {
            return ApiResponse::error('Lead not found', 404);
        }

        return ApiResponse::success(true, 'Lead deleted', []);
    }
}