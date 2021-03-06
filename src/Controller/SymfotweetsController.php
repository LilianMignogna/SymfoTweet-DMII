<?php

// src/Controller/SymfotweetsController.php
namespace App\Controller;

use App\Entity\Symfotweets;
use App\Entity\SymfoRT;
use App\Form\Type\SymfotweetsFormType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class SymfotweetsController extends AbstractController
{

    #[Route('/symfotweets/new', name: 'post_symfotweet')]
    public function newSymfotweet(Request $request, ManagerRegistry $doctrine): Response
    {
        $symfoTweets = new Symfotweets();

        $form = $this->createForm(SymfotweetsFormType::class, $symfoTweets);
        $form->handleRequest($request);

        /** @var \App\Entity\Symfotweetos $user */
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();

            $symfoTweets = $form->getData();
            $symfoTweets->setPostdate(new \DateTime());
            $symfoTweets->setSymfotweetos($user);

            $entityManager->persist($symfoTweets);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('symfotweets/new_symfotweet.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/symfotweets', name: 'symfotweets_list')]
    public function list(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Symfotweets::class);
        $symfotweets = $repository->findAll();

        return $this->render('symfotweets/listing.html.twig', [
            "symfotweets" => $symfotweets
        ]);
    }

    #[Route('/symfotweets/{symfotweets_id}', name: 'symfotweets_alone')]
    #[ParamConverter('symfotweets_id', options: ['mapping' => ['symfotweets_id' => 'id']])]
    public function alone(string $symfotweets_id, ManagerRegistry $doctrine): Response
    {
        $symfotweet = $doctrine->getRepository(Symfotweets::class)->find($symfotweets_id);

        if (!$symfotweet) {
            throw $this->createNotFoundException(
                'No symfotweet found for id '.$symfotweets_id
            );
        }

        return $this->render('symfotweets/alone.html.twig', [
            "symfotweet" => $symfotweet
        ]);
    }

    #[Route('/symfotweets/delete/{symfotweets_id}', name: 'symfotweets_delete')]
    #[ParamConverter('symfotweets_id', options: ['mapping' => ['symfotweets_id' => 'id']])]
    public function delete(string $symfotweets_id, ManagerRegistry $doctrine): Response
    {
        $symfotweet = $doctrine->getRepository(Symfotweets::class)->find($symfotweets_id);

        if (!$symfotweet) {
            throw $this->createNotFoundException(
                'No symfotweet found for id '.$symfotweets_id
            );
        }

        $entityManager = $doctrine->getManager();
        $entityManager->remove($symfotweet);
        $entityManager->flush();

        return $this->redirectToRoute('symfotweets_list');
    }

    #[Route('/symfotweets/rt/{symfotweets_id}', name: 'symfotweets_rt')]
    #[ParamConverter('symfotweets_id', options: ['mapping' => ['symfotweets_id' => 'id']])]
    public function symfoRT(string $symfotweets_id, ManagerRegistry $doctrine)
    {
        $user = $this->getUser();
        $symfoRTDatabase = $doctrine->getRepository(SymfoRT::class)->findSymfoRTWithSymfotweetIdAndSymfotweetosId($symfotweets_id, $user->getID());
        // echo '<pre>';
        // var_dump($symfoRTDatabase);
        // die;

        if (!$symfoRTDatabase) {
            $symfoRT = new SymfoRT();

            $symfotweet = $doctrine->getRepository(Symfotweets::class)->find($symfotweets_id);
            /** @var \App\Entity\Symfotweetos $user */
            $user = $this->getUser();
            $symfoRT->setSymfotweetos($user);
            $symfoRT->setSymfotweets($symfotweet);
    
            $entityManager = $doctrine->getManager();
            $entityManager->persist($symfoRT);
            $entityManager->flush();
            return new JsonResponse(array(
                'status' => 'OK',
                'message' => "+1"),
            200);
        }
        else{
            $entityManager = $doctrine->getManager();
            $entityManager->remove($symfoRTDatabase);
            $entityManager->flush();
            return new JsonResponse(array(
                'status' => 'OK',
                'message' => "-1"),
            200);
        }

        return new JsonResponse(array(
            'status' => 'Error',
            'message' => "Error"),
        400);
    }
}
