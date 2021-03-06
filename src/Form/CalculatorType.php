<?php

namespace App\Form;

use App\Calculator\CalculatorOperationFactory;
use App\Entity\Calculator;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalculatorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('operation', ChoiceType::class, [
                'choices' => [
                    'Plus (+)' => CalculatorOperationFactory::PLUS,
                    'Minus (-)' => CalculatorOperationFactory::MINUS,
                    'Multiplication (*)' => CalculatorOperationFactory::MULTIPLICATION,
                    'Division (/)' => CalculatorOperationFactory::DIVISION,
                ]
            ])
            ->add('numberOne')
            ->add('numberTwo')
            ->add('submit', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Calculator::class,
        ]);
    }
}
