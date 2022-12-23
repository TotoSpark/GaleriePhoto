<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;






class test extends AbstractController
{
    #[Route('/test')]



    public function menu()
    {

        return $this->render('test.html.twig');
    }

}

