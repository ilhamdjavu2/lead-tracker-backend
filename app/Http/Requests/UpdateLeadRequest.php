<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class UpdateLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
	{
		return [
			'name' => 'sometimes|string|max:255',
			'email' => [
				'sometimes',
				'email',
				'max:255',
				Rule::unique('leads', 'email')->ignore($this->route('lead'))
			],
			'phone' => 'sometimes|string|max:15',
			'budget' => 'sometimes|numeric',
			'status' => 'sometimes|in:new,contacted,qualified,lost',
			'notes' => 'sometimes|string',
		];
	}
}