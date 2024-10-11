<?php

namespace App\Rules;

use App\Services\TaxBandService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\App;

class MinAllowedThresholdRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        /**@var TaxBandService $taxBandService*/
        $taxBandService = App::make(TaxBandService::class);

        $lastTaxBand = $taxBandService->getLatest();

        if ($value <= $lastTaxBand->threshold) {
            $fail("The $attribute must be higher than the previous one.");
        }
    }
}
