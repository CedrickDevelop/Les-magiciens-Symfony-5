<?php

namespace App\Controller;

use App\Classe\Search;
use App\Entity\Recipe;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $recipes = $this->entityManager->getRepository(Recipe::class)->findAll();


        return $this->render('home/index.html.twig',[
            'recipes'   => $recipes
        ]);
    }
}
