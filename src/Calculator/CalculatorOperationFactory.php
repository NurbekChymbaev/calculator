<?php

namespace App\Calculator;

use App\Calculator\Exception\UnsupportedOperationException;
use App\Calculator\Operation\Division;
use App\Calculator\Operation\Minus;
use App\Calculator\Operation\Multiplication;
use App\Calculator\Operation\Plus;

class CalculatorOperationFactory
{
    const PLUS = 'plus';
    const MINUS = 'minus';
    const MULTIPLICATION = 'multiplication';
    const DIVISION = 'division';

    private array $operationsMap = [
        self::PLUS => Plus::class,
        self::MINUS => Minus::class,
        self::MULTIPLICATION => Multiplication::class,
        self::DIVISION => Division::class
    ];

    public function newOperationFromName(string $name): CalculatorOperationInterface
    {
        if(!isset($this->operationsMap[$name])) {
            throw new UnsupportedOperationException(sprintf('Operation %s is not supported!', $name));
        }
        return new $this->operationsMap[$name];
    }
}