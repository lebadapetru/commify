<?php

namespace App\Services;

use App\DTO\CalculatedSalaryDTO;
use App\DTO\CreateTaxBandDTO;
use App\Models\TaxBand;
use App\Repositories\TaxBandRepository;

readonly class TaxBandService
{
    public function __construct(
        private TaxBandRepository $taxBandRepository,
    )
    {

    }

    public function create(CreateTaxBandDTO $createTaxBandDTO): TaxBand
    {
        return $this->taxBandRepository->create($createTaxBandDTO->toArray());
    }

    public function getLatest(): TaxBand
    {
        return $this->taxBandRepository->getLatest();
    }

    public function calculateSalary(float $salary): CalculatedSalaryDTO
    {
        $taxBands = $this->taxBandRepository->getTaxBandsByThreshold(threshold: $salary);

        $tax = 0;
        $bandSalary = $salary;
        foreach ($taxBands as $taxBand) {
            $bandSalary -= $taxBand->threshold;
            $tax += $bandSalary * ($taxBand->rate / 100);
        }

        $grossMonthly = round($salary / 12, 2);
        $netAnnually = round($salary - $tax, 2);
        $netMonthly = round($netAnnually / 12, 2);
        $annualTaxPaid = round($tax, 2);
        $monthlyTaxPaid = round($tax / 12, 2);

        return new CalculatedSalaryDTO(
            grossAnnually: $salary,
            grossMonthly: $grossMonthly,
            netAnnually: $netAnnually,
            netMonthly: $netMonthly,
            annualTaxPaid: $annualTaxPaid,
            monthlyTaxPaid: $monthlyTaxPaid,
        );
    }
}
