<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class Gacceuil extends AbstractController
{
    #[Route('/GAcceuil')]
    public function home(){
        return $this->render('Gacceuil.html.twig');
    }
}