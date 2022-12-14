<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;

class AuthController extends AbstractController
{
    /**
     * @Route("./login", name="auth_login")
     * @return Response
     */
    public function login(Request $request)
    {
        $builder = $this->createFormBuilder();
        $contrainte = new NotBlank();

        $builder->add('nom',TextType::class,[
            'constraints'=>[$contrainte, new Length(['min'=>2])]
        ])
            ->add('btSubmit', SubmitType::class);

        $form = $builder->getForm();
        $infoRendu = $form->createView();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            return $this->render("authok.html.twig",["data" => $form->getData()]);
        } else {
            return $this->render("login.html.twig",["infoForm" => $infoRendu]);
        }
    }
}