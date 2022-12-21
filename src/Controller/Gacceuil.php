<?php

namespace App\Controller;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class Gacceuil extends AbstractController
{
    #[Route('/GAcceuil')]
    //public function home(){
      // return $this->render('Gacceuil.html.twig');
     // session_start();
      //echo $_SESSION['email'];
      // if (!isset($_SESSION['email'])) {
      //echo 'Vous devez vous identifier';
     //exit;
       // }


   // }


    public function menu()
    {
        $chemin = __DIR__ . "/../../public/image/";
        $fichier = scandir($chemin);
        foreach ($fichier as $test) {
            if (is_dir($test))
                continue;
            else {
                $files[] = $test;
            }
        }
        return $this->render('Gacceuil.html.twig', ["images" => $files]);
    }
    public function getemail(): ?email
   {
        return $this->email;
   }
    public function setEmail($email): void{
        $this->email = $email;
    }
    }

