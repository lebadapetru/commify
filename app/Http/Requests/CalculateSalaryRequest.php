<?php

namespace App\Http\Requests;

class CalculateSalaryRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'salary' => 'required|integer|min:0',
        ];
    }
}
