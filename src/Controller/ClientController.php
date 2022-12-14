<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route(
    '/client'
)]
class ClientController extends AbstractController
{

    #[Route(
        '/prenom/{nom}',
        requirements: ['nom' => '^[A-Za-z]+(?:-?[A-Za-z]+)+$']
    )]
    function info($nom)
    {
        $urlImg = $this->generateUrl('client_photo',['nom'=>$nom]);
        return new Response("Le nom inscrit dans l'url est $nom <img src=\"$urlImg\"/>");
    }

    #[Route(
        '/photo/{nom}',
        name:"client_photo"
    )]
    function photo($nom)
    {
        return new BinaryFileResponse(__DIR__ . "/../../data/msi.png");
    }
}