<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]

    public function index(): Response
    {
        $form = $this->createForm(UserType::class);

        return $this->render('product/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
