<?php

namespace Tests\Unit;

use App\DTO\CalculatedSalaryDTO;
use App\Repositories\TaxBandRepository;
use App\Services\TaxBandService;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\TestCase;
use Mockery as m;

class CalculateSalaryServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        m::close();
    }

    public function testCalculateSalary(): void
    {
        $salary = 40000;
        $mockTaxBandRepository = m::mock(TaxBandRepository::class);
        $mockTaxBandRepository
            ->shouldReceive('getTaxBandsByThreshold')
            ->with($salary)
            ->andReturn(new Collection([
                (object)[
                    'threshold' => 20000,
                    'rate'      => 40
                ],
                (object)[
                    'threshold' => 5000,
                    'rate'      => 20
                ],
                (object)[
                    'threshold' => 0,
                    'rate'      => 0
                ],
            ]));

        $service = new TaxBandService($mockTaxBandRepository);

        $result = $service->calculateSalary($salary);

        $this->assertInstanceOf(CalculatedSalaryDTO::class, $result);
        $this->assertEquals($salary, $result->grossAnnually);
        $this->assertEquals(3333.33, $result->grossMonthly);
        $this->assertEquals(29000, $result->netAnnually);
        $this->assertEquals(2416.67, $result->netMonthly);
        $this->assertEquals(11000, $result->annualTaxPaid);
        $this->assertEquals(916.67, $result->monthlyTaxPaid);
    }
}
