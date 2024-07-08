<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DebugDependentFieldController extends AbstractController
{
    #[Route('/debug/dependent/field', name: 'app_debug_dependent_field')]
    public function index(): Response
    {
        return $this->render('debug_dependent_field/index.html.twig', [
            'controller_name' => 'DebugDependentFieldController',
        ]);
    }
}
