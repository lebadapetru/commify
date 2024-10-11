<?php

namespace App\Http\Requests;

use App\Rules\MinAllowedThresholdRule;

class CreateTaxBandRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50|unique:tax_bands,name',
            'threshold' => [
                'required',
                'integer',
                'min:0',
                new MinAllowedThresholdRule(),
            ],
            'rate' => 'required|integer|between:0,40',
        ];
    }
}
