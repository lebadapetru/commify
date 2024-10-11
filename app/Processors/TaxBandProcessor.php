<?php

namespace App\Processors;

use App\DTO\CreateTaxBandDTO;
use Illuminate\Support\Str;

class TaxBandProcessor
{
    public function processTaxBandForCreate(array $input): CreateTaxBandDTO
    {
        return new CreateTaxBandDTO(
            name: Str::ucfirst($input['name']),
            threshold: $input['threshold'],
            rate: $input['rate'],
        );
    }
}
