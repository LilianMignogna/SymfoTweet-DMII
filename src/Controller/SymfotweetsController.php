<?php

// src/Controller/SymfotweetsController.php
namespace App\Controller;

use App\Entity\Symfotweets;
use App\Form\Type\SymfotweetsFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SymfotweetsController extends AbstractController
{

    #[Route('/symfotweets/new', name: 'post_symfotweet')]
    public function newSymfotweet(Request $request, ManagerRegistry $doctrine): Response
    {
        $symfoTweets = new Symfotweets();

        $form = $this->createForm(SymfotweetsFormType::class, $symfoTweets);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();

            $symfoTweets = $form->getData();
            $symfoTweets->setPostdate(new \DateTime());

            $entityManager->persist($symfoTweets);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('home/new_symfotweet.html.twig', [
            'form' => $form->createView(),
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
}
