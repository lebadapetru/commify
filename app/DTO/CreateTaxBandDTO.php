<?php

namespace App\DTO;

use Illuminate\Contracts\Support\Arrayable;

class CreateTaxBandDTO extends BaseDTO
{
    public function __construct(
        private readonly string $name,
        private readonly int $threshold,
        private readonly int $rate,
    ) {}
}
