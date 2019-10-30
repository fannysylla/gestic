<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReferentielRepository")
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
     * @ORM\Column(type="string", length=255)
     */
    private $nomref;

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
}
