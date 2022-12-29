<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class test extends AbstractController
{#[Route('/test', name: 'app_test')]
    public function index()
    {
        return $this->render('add.html.twig');

    }

    public function add()
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        return $this->render('blog/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    // ...
}