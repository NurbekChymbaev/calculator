<?php

namespace App\Calculator\Operation;

use App\Calculator\CalculatorOperationInterface;

class Plus implements CalculatorOperationInterface
{
    public function operate(float|int $numberOne, float|int $numberTwo): int|float
    {
        return $numberOne + $numberTwo;
    }
}