<?php

namespace App\Controller;


use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class Gacceuil extends AbstractController
{
    // #[Route('/GAcceuil')]
    #[Route("/", name: 'acceuil')]
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
        //$db = \Config\Database::connect();
        //$query = $db->query('SELECT * FROM user');
        //$test = $query->getResult();
        $test = ('SELECT * FROM user');

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

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function test()
    {
        return $this->render('test.html.twig');
    }

    public function add(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $article->setLastUpdateDate(new \DateTime());

            if ($article->getPicture() !== null) {
                $file = $form->get('picture')->getData();
                $fileName = uniqid() . '.' . $file->guessExtension();

                try {
                    $file->move(
                        $this->getParameter('images_directory'), // Le dossier dans lequel le fichier va être charger
                        $fileName
                    );
                } catch (FileException $e) {
                    return new Response($e->getMessage());
                }

                $article->setPicture($fileName);
            }

            if ($article->getIsPublished()) {
                $article->setPublicationDate(new \DateTime());
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return new Response('L\'article a bien été enregistrer.');
        }

        return $this->render('blog/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function edit($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        return $this->render('blog/edit.html.twig', [
            'article' => $article
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
// ...
            ->add('imageFile', VichImageType::class, [
                'label' => 'nom de limage',

            ]);

    }

}