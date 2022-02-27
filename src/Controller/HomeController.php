<?php

// src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Symfotweets;
use App\Entity\Symfotweetos;
use App\Form\Type\SymfotweetsFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
        ]);
    }

    #[Route('/profile', name: 'profile')]
    public function profile(): Response
    {

        return $this->render('home/profile.html.twig', [
            "home" => "home",
        ]);
    }

    #[Route('/symfotweetos/{symfotweetos_id}', name: 'symfotweetos')]
    #[ParamConverter('symfotweetos_id', options: ['mapping' => ['symfotweetos_id' => 'id']])]
    public function show(string $symfotweetos_id, ManagerRegistry $doctrine): Response
    {
        $symfotweetos = $doctrine->getRepository(Symfotweetos::class)->find($symfotweetos_id);

        if (!$symfotweetos) {
            throw $this->createNotFoundException(
                'No symfotweetos found for id '.$symfotweetos_id
            );
        }
        return $this->render('home/profile.html.twig', [
            "symfotweetos" => $symfotweetos
        ]);
    }
}