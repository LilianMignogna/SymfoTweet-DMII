<?php

namespace App\Entity;

use App\Repository\SymfotweetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SymfotweetsRepository::class)]
class Symfotweets
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Symfotweetos::class, inversedBy: 'symfotweets')]
    #[ORM\JoinColumn(nullable: false)]
    private $symfotweetos;

    #[ORM\Column(type: 'string', length: 255)]
    private $text;

    #[ORM\Column(type: 'datetime')]
    private $postdate;

    #[ORM\OneToMany(mappedBy: 'symfotweets', targetEntity: SymfoRT::class, orphanRemoval: true)]
    private $symfoRTs;
    

    public function __construct()
    {
        $this->symfoRTs = new ArrayCollection();
    }

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPostdate(): ?\DateTimeInterface
    {
        return $this->postdate;
    }

    public function setPostdate(\DateTimeInterface $postdate): self
    {
        $this->postdate = $postdate;

        return $this;
    }

    /**
     * @return Collection|SymfoRT[]
     */
    public function getSymfoRTs(): Collection
    {
        return $this->symfoRTs;
    }

    public function addSymfoRT(SymfoRT $symfoRT): self
    {
        if (!$this->symfoRTs->contains($symfoRT)) {
            $this->symfoRTs[] = $symfoRT;
            $symfoRT->setSymfotweets($this);
        }

        return $this;
    }

    public function removeSymfoRT(SymfoRT $symfoRT): self
    {
        if ($this->symfoRTs->removeElement($symfoRT)) {
            // set the owning side to null (unless already changed)
            if ($symfoRT->getSymfotweets() === $this) {
                $symfoRT->setSymfotweets(null);
            }
        }

        return $this;
    }
}
