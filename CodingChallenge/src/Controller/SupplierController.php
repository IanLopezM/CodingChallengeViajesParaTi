<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends AbstractController
{
    /**
     * @Route("/supplier", name="app_supplier")
     */
    public function index(): Response
    {
        return $this->render('supplier/index.html.twig', [
            'controller_name' => 'SupplierController',
        ]);
    }
}
