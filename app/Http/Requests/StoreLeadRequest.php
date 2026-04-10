<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
			'email' => 'required|email|unique:leads,email|max:255',
            'phone' => 'nullable|string|max:15',
            'budget' => 'nullable|numeric',
            'status' => 'nullable|in:new,contacted,qualified,lost',
            'notes' => 'nullable|string',
        ];
    }
}