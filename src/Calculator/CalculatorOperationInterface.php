<?php
namespace App\Calculator;

interface CalculatorOperationInterface
{
    public function operate(int|float $numberOne, int|float $numberTwo): int|float;
}