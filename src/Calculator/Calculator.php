<?php

namespace App\Calculator;

class Calculator implements CalculatorInterface
{
    public function calculate(string $operation, int|float $numberOne, int|float $numberTwo): int|float
    {
        return (new CalculatorOperationFactory())
            ->newOperationFromName($operation)
            ->operate($numberOne, $numberTwo);
    }
}