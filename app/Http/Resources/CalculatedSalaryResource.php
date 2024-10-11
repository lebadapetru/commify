<?php

namespace App\Http\Resources;

use App\DTO\CalculatedSalaryDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CalculatedSalaryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /**@var CalculatedSalaryDTO $calculatedSalaryDTO*/
        $calculatedSalaryDTO = $this->resource;

        return $calculatedSalaryDTO->toArray();
    }
}
