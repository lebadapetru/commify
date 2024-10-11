<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateSalaryRequest;
use App\Http\Requests\CreateTaxBandRequest;
use App\Http\Resources\CalculatedSalaryResource;
use App\Http\Resources\TaxBandResource;
use App\Processors\TaxBandProcessor;
use App\Services\TaxBandService;
use Illuminate\Support\Facades\Route;

class TaxBandController extends BaseController
{
    public function __construct(
        private readonly TaxBandProcessor $taxBandProcessor,
        private readonly TaxBandService $taxBandService,
    )
    {

    }
    public static function routes(): void
    {
        Route::middleware([])
            ->prefix('tax-bands')
            ->controller(self::class)
            ->group(function () {
                Route::post('/calculate-salary', 'calculateSalary');
                Route::post('/', 'create');
            });
    }

    public function create(CreateTaxBandRequest $request): TaxBandResource
    {
        $validatedData = $request->validated();
        $processedData = $this->taxBandProcessor->processTaxBandForCreate($validatedData);
        $taxBand = $this->taxBandService->create($processedData);

        return new TaxBandResource($taxBand);
    }

    public function calculateSalary(CalculateSalaryRequest $request): CalculatedSalaryResource
    {
        $salary = $request->validated('salary');
        $calculatedSalaryDTO = $this->taxBandService->calculateSalary($salary);

        return new CalculatedSalaryResource($calculatedSalaryDTO);
    }
}
