<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SessionRepository")
 */
class Session
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomsess;

    /**
     * @ORM\Column(type="integer")
     */
    private $effectif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Refsession", mappedBy="session")
     */
    private $refsessions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annee;

    /**
     * @ORM\Column(type="date")
     */
    private $datedebut;

    /**
     * @ORM\Column(type="date")
     */
    private $datefin;

    public function __construct()
    {
        $this->refsessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomsess(): ?string
    {
        return $this->nomsess;
    }

    public function setNomsess(string $nomsess): self
    {
        $this->nomsess = $nomsess;

        return $this;
    }

    public function getEffectif(): ?int
    {
        return $this->effectif;
    }

    public function setEffectif(int $effectif): self
    {
        $this->effectif = $effectif;

        return $this;
    }

    /**
     * @return Collection|Refsession[]
     */
    public function getRefsessions(): Collection
    {
        return $this->refsessions;
    }

    public function addRefsession(Refsession $refsession): self
    {
        if (!$this->refsessions->contains($refsession)) {
            $this->refsessions[] = $refsession;
            $refsession->setSession($this);
        }

        return $this;
    }

    public function removeRefsession(Refsession $refsession): self
    {
        if ($this->refsessions->contains($refsession)) {
            $this->refsessions->removeElement($refsession);
            // set the owning side to null (unless already changed)
            if ($refsession->getSession() === $this) {
                $refsession->setSession(null);
            }
        }

        return $this;
    }

    public function getAnnee(): ?string
    {
        return $this->annee;
    }

    public function setAnnee(string $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }
}
