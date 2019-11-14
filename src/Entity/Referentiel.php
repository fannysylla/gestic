<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ReferentielRepository")
 *   @UniqueEntity("nomref",message="ce referentiel existe deja")
 */
class Referentiel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)  
     * @Assert\NotBlank(message="le nom ne doit pas etre vide")
     * 
     */
    private $nomref;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Refsession", mappedBy="referentiel")
     */
    private $refsessions;

    public function __construct()
    {
        $this->refsessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomref(): ?string
    {
        return $this->nomref;
    }

    public function setNomref(string $nomref): self
    {
        $this->nomref = $nomref;

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
            $refsession->setReferentiel($this);
        }

        return $this;
    }

    public function removeRefsession(Refsession $refsession): self
    {
        if ($this->refsessions->contains($refsession)) {
            $this->refsessions->removeElement($refsession);
            // set the owning side to null (unless already changed)
            if ($refsession->getReferentiel() === $this) {
                $refsession->setReferentiel(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->nomref;
    }
}
