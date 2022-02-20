<?php

namespace App\DataFixtures;

use App\Entity\Symfotweetos;
use App\Entity\Symfotweets;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $encoder;
    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager): void
    {
        
        $symfotweetos1 = new Symfotweetos();
        $manager->persist(
            $symfotweetos1->setName("YassEncore")
                          ->setUsername("PatrickAdemo")
                          ->setBiography("la route sera très longue")
                          ->setEmail("yass@yass.fr")
                          ->setRoles([""])
                          ->setPassword($this->encoder->hashPassword($symfotweetos1,"yassencore"))
                        //   ->addSymfotweets([$symfotweets1, $symfotweets2])
        );
        $manager->flush();

        $symfotweetos2 = new Symfotweetos();
        $manager->persist(
            $symfotweetos2->setName("Billy")
                          ->setUsername("RebeuDeter")
                          ->setBiography("")
                          ->setEmail("billy@billy.fr")
                          ->setRoles([""])
                          ->setPassword($this->encoder->hashPassword($symfotweetos2,"rebeudeter"))
        );
        $manager->flush();

        $symfotweetos3 = new Symfotweetos();
        $manager->persist(
            $symfotweetos3->setName("Sardoche")
                          ->setUsername("Sardoche_Lol")
                          ->setBiography("He/Him | The nicest guy | Je mène une croisade contre l'hypocrisie | Twitch Partner http://twitch.tv/Sardoche | Business : sardoche.offers@gmail.com")
                          ->setEmail("sardoche@sardoche.fr")
                          ->setRoles([""])
                          ->setPassword($this->encoder->hashPassword($symfotweetos3,"sardoche"))
        );
        $manager->flush();

        $symfotweetos4 = new Symfotweetos();
        $manager->persist(
            $symfotweetos4->setName("léo-paul")
                          ->setUsername("leopaulvevo")
                          ->setBiography("571ème fan de garfield @garfieldfan571")
                          ->setEmail("leopaul@leopaul.fr")
                          ->setRoles([""])
                          ->setPassword($this->encoder->hashPassword($symfotweetos4,"garfieldfan"))
        );
        $manager->flush();

        $symfotweetos5 = new Symfotweetos();
        $manager->persist(
            $symfotweetos5->setName("Admin")
                          ->setUsername("admin")
                          ->setBiography("admin")
                          ->setEmail("admin@admin.fr")
                          ->setRoles(["ROLE_ADMIN"])
                          ->setPassword($this->encoder->hashPassword($symfotweetos5,"adminadmin"))
        );
        $manager->flush();
        

        $symfotweets1 = new Symfotweets();
        $manager->persist(
            $symfotweets1->setText("3 rt et je stream immédiatement")
                         ->setPostdate(new \DateTime("now"))
                         ->setSymfotweetos($symfotweetos1)
        );
        $manager->flush();

        $symfotweets2 = new Symfotweets();
        $manager->persist(
            $symfotweets2->setText("C'est un truc de fou malade sérieux ahah")
                         ->setPostdate(new \DateTime("now"))
                         ->setSymfotweetos($symfotweetos1)
        );
        $manager->flush();

        $symfotweets3 = new Symfotweets();
        $manager->persist(
            $symfotweets3->setText("Hou pinaise Marge... Est-ce que tu m'as préparé mon donut... sucré... au sucre... ???")
                         ->setPostdate(new \DateTime("now"))
                         ->setSymfotweetos($symfotweetos2)
        );
        $manager->flush();

        $symfotweets4 = new Symfotweets();
        $manager->persist(
            $symfotweets4->setText("Mais c'était sur en fait !!! C'était suuuuuurrr !!!!!")
                         ->setPostdate(new \DateTime("now"))
                         ->setSymfotweetos($symfotweetos3)
        );
        $manager->flush();

        $symfotweets5 = new Symfotweets();
        $manager->persist(
            $symfotweets5->setText("Non mais sérieux vous avez 50 ans vous traînez sur Facebook et vous partagez les blagues de vos darons")
                         ->setPostdate(new \DateTime("now"))
                         ->setSymfotweetos($symfotweetos3)
        );
        $manager->flush();

        $symfotweets6 = new Symfotweets();
        $manager->persist(
            $symfotweets6->setText(" Garfield Kart AHAH chuis mort")
                         ->setPostdate(new \DateTime("now"))
                         ->setSymfotweetos($symfotweetos4)
        );
        $manager->flush();

    }
}
