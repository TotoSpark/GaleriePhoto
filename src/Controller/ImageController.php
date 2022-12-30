<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ImageController extends AbstractController
{
   // #[Route("/",name:'image')]
    #[Route('/image')]
    public function index():Response
    {
        return $this->render("home.html.twig");
    }
    #[Route("/images/{img}",name:"image_show")]
    public function image($img)
    {
        return $this->render("img.html.twig",["img"=>$img]);
    }

    #[Route( "/photo/{img}", name:"client_photo")]
    public function imageShow($img)
    {
        return new BinaryFileResponse(__DIR__."/../../public/image/".$img);
    }
    public function menu()
    {
        $chemin = __DIR__."/../../public/image/";
        $fichier=scandir($chemin);
        foreach($fichier as $test)
        {
            if(is_dir($test))
                continue;
            else{
                $files[]=$test;
            }
        }


        return $this->render('menu.html.twig',["images"=>$files]);
    }

}

?>