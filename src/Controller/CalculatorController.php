<?php

namespace App\Controller;

use App\Calculator\CalculatorInterface;
use App\Form\CalculatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    #[Route('/calculator', methods: ['GET', 'POST'])]
    public function index(Request $request, CalculatorInterface $calculator): Response
    {
        $form = $this->createForm(CalculatorType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $result = $calculator->calculate($data->getOperation(), $data->getNumberOne(), $data->getNumberTwo());
        }

        return $this->render('calculator/index.html.twig', [
            'form' => $form->createView(),
            'result' => $result ?? null,
        ]);
    }
}
