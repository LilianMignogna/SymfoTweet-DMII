<?php

namespace App\Entity;

use App\Repository\SymfoRTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymfoRTRepository::class)]
class SymfoRT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Symfotweetos::class, inversedBy: 'symfoRTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $symfotweetos;

    #[ORM\ManyToOne(targetEntity: Symfotweets::class, inversedBy: 'symfoRTs')]
    #[ORM\JoinColumn(nullable: false)]
    private $symfotweets;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSymfotweetos(): ?Symfotweetos
    {
        return $this->symfotweetos;
    }

    public function setSymfotweetos(?Symfotweetos $symfotweetos): self
    {
        $this->symfotweetos = $symfotweetos;

        return $this;
    }

    public function getSymfotweets(): ?Symfotweets
    {
        return $this->symfotweets;
    }

    public function setSymfotweets(?Symfotweets $symfotweets): self
    {
        $this->symfotweets = $symfotweets;

        return $this;
    }
}
