<?php

namespace App\Entity;

use App\Calculator\CalculatorOperationFactory;
use Symfony\Component\Validator\Constraints as Assert;

class Calculator
{
    #[Assert\NotBlank]
    #[Assert\Choice([
        CalculatorOperationFactory::PLUS,
        CalculatorOperationFactory::MINUS,
        CalculatorOperationFactory::MULTIPLICATION,
        CalculatorOperationFactory::DIVISION
    ])]
    private $operation;

    #[Assert\NotBlank]
    #[Assert\Type('numeric')]
    private $numberOne;

    #[Assert\NotBlank]
    #[Assert\Type('numeric')]
    private $numberTwo;

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    public function getNumberOne(): ?string
    {
        return $this->numberOne;
    }

    public function setNumberOne(string $numberOne): self
    {
        $this->numberOne = $numberOne;

        return $this;
    }

    public function getNumberTwo(): ?string
    {
        return $this->numberTwo;
    }

    public function setNumberTwo(string $numberTwo): self
    {
        $this->numberTwo = $numberTwo;

        return $this;
    }
}
