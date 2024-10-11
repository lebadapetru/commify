<?php

namespace App\DTO;

class CalculatedSalaryDTO extends BaseDTO
{
    public function __construct(
        private readonly float $grossAnnually,
        private readonly float $grossMonthly,
        private readonly float $netAnnually,
        private readonly float $netMonthly,
        private readonly float $annualTaxPaid,
        private readonly float $monthlyTaxPaid,
    ) {}

    public function __get($name) {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        trigger_error("Undefined property: " . get_class($this) . "::$name");
        return null;
    }

    public function __set($name, $value) {
        if (property_exists($this, $name)) {
            trigger_error("Cannot set read-only property: " . get_class($this) . "::$name");
        }
    }
}
