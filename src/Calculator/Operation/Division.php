<?php
namespace App\Calculator\Operation;

use App\Calculator\Exception\DivisionByZeroException;
use App\Calculator\CalculatorOperationInterface;

class Division implements CalculatorOperationInterface
{
    public function operate(float|int $numberOne, float|int $numberTwo): int|float
    {
        if ($numberTwo === 0) {
            throw new DivisionByZeroException('Division by zero is not applicable!');
        }

        return $numberOne / $numberTwo;
    }
}