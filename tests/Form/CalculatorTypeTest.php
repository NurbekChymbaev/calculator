<?php

namespace App\Tests\Form;

use App\Calculator\CalculatorOperationFactory;
use App\Entity\Calculator;
use App\Form\CalculatorType;
use Symfony\Component\Form\Test\TypeTestCase;

class CalculatorTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $data = [
            'operation' => CalculatorOperationFactory::PLUS,
            'numberOne' => 1,
            'numberTwo' => 2
        ];
        $form = $this->factory->create(CalculatorType::class);
        $form->submit($data);
        $this->assertTrue($form->isSynchronized());

        $calculator = (new Calculator())
            ->setOperation(CalculatorOperationFactory::PLUS)
            ->setNumberOne(1)
            ->setNumberTwo(2);

        $this->assertEquals($calculator, $form->getData());
    }
}