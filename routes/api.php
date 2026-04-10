<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

Route::middleware('api.key')->group(function () {
    Route::apiResource('leads', LeadController::class);
	
	Route::get('/health', function () {
		return response()->json([
			'status' => 'ok'
		]);
	});
});