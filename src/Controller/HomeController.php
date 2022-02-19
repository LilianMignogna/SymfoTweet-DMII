<?php

// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            "home" => "home",
        ]);
    }

    #[Route('/symfotweets', name: 'symfotweets_list')]
    public function list(): Response
    {
        // ...
        return $this->render('home/listing.html.twig', [
            "home" => "home",
        ]);
    }

    #[Route('/symfotweetos/{symfotweetos_id}', name: 'symfotweetos')]
    #[ParamConverter('symfotweetos_id', options: ['mapping' => ['symfotweetos_id' => 'id']])]
    public function show(string $symfotweetos_id): Response
    {
        // ...
        return $this->render('home/profile.html.twig', [
            "home" => "home",
        ]);
    }
}