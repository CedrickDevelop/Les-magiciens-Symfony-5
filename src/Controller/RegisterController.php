<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    //////////////////////////////////////////////////////////////////////*
    //////////Instancie le USER et CREE Le FORMULAIRE DANS LA VUE ////////*
    //////////////////////////////////////////////////////////////////////*

    #[Route('register/register', name: 'register')]
    public function index(Request $request, UserPasswordEncoderInterface $crypt): Response
    {
        // Creation du User et formulaire
        $user = new User();
        $form = $this->createForm(RegisterFormType::class, $user);

        //Reception des données
        $form->handleRequest($request);




        // Si tout est ok envoi à la bdd
        if ($form->isSubmitted() && $form->isValid()) {
            //Recupère les données de l'utilisateur
            $user = $form->getData();

            //Encodage du mot de passe
            $password = $crypt->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $user->setRoles(['ROLE_USER']);
            $user->getRoles();

            //Envoi en Bdd
            $this->entityManager->persist($user);
            $this->entityManager->flush();

            return $this->redirectToRoute('account');
        } else {
            $message = "Verifiez vos informations avant de valider. ";
        }

        // Creation de la vue avec formulaire
        return $this->render('register/register.html.twig',[
            'form'  => $form->createView(),
            'message'   => $message
        ]);
    }
}