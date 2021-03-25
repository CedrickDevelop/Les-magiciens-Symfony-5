<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }


    #[Route('/contact', name: 'contact')]
    public function index(Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);


        if(($form->isSubmitted()) && ($form->isValid())){

            $contact = new Contact();

            $date = new \Datetime();
            $dateFr = $date->format('d/m/Y');

            $nom = $form->get('nom')->getData();
            $prenom = $form->get('prenom')->getData();
            $message = $form->get('message')->getData();
            $email = $form->get('email')->getData();

            $data = $form->getData();
            var_dump($data);
            $contact->setNom($nom)->setPrenom($prenom)->setMessageContact($message)->setEmail($email)->setDate($date);

            $this->entityManager->persist($contact);
            $this->entityManager->flush();

            $this->addFlash('notice', 'Merci de nous avoir contacté nous reviendrons vers vous rapidement');

            return $this->redirectToRoute('home');

        }

        return $this->render('contact/index.html.twig', [
            'form'  =>  $form->createView()
            ]
        );
    }
}
