<?php

namespace App\Calculator;

interface CalculatorInterface
{
    public function calculate(string $operation, int|float $numberOne, int|float $numberTwo): int|float;
}