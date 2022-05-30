<?php

namespace App\Tests\Calculator;

use App\Calculator\CalculatorInterface;
use App\Calculator\Exception\DivisionByZeroException;
use App\Calculator\CalculatorOperationFactory;
use App\Calculator\Exception\UnsupportedOperationException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorTest extends KernelTestCase
{
    public function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $this->container = static::getContainer();
    }

    /**
     * @dataProvider provideOperations
     */
    public function testCalculation($operation, $numberOne, $numberTwo, $expected)
    {
        $calculator = $this->container->get(CalculatorInterface::class);
        $result = $calculator->calculate($operation, $numberOne, $numberTwo);
        $this->assertEquals($expected, $result);
    }

    public function testDivisionByZero()
    {
        $this->expectException(DivisionByZeroException::class);
        $calculator = $this->container->get(CalculatorInterface::class);
        $calculator->calculate(CalculatorOperationFactory::DIVISION, 1, 0);
    }

    public function testUnsupportedOperationType()
    {
        $this->expectException(UnsupportedOperationException::class);
        $calculator = $this->container->get(CalculatorInterface::class);
        $calculator->calculate('mod', 1, 0);
    }

    public function provideOperations(): array
    {
        return [
            [CalculatorOperationFactory::PLUS, 1, 2, 3],
            [CalculatorOperationFactory::PLUS, 1.1, 2.2, 3.3],
            [CalculatorOperationFactory::PLUS, 0, 1, 1],

            [CalculatorOperationFactory::MINUS, 2, 1, 1],
            [CalculatorOperationFactory::MINUS, 2.2, 1.1, 1.1],
            [CalculatorOperationFactory::MINUS, 1.1, 2.2, -1.1],

            [CalculatorOperationFactory::MULTIPLICATION, 5, 2, 10],
            [CalculatorOperationFactory::MULTIPLICATION, 1.1, 2, 2.2],
            [CalculatorOperationFactory::MULTIPLICATION, 1.1, 2.2, 2.42],

            [CalculatorOperationFactory::DIVISION, 4, 2, 2],
            [CalculatorOperationFactory::DIVISION, 4.4, 2, 2.2],
            [CalculatorOperationFactory::DIVISION, 5, 2, 2.5],
        ];
    }
}