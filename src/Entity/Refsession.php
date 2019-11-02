<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RefsessionRepository")
 */
class Refsession
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $effectiftotal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Referentiel", inversedBy="refsessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $referentiel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Session", inversedBy="refsessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEffectiftotal(): ?int
    {
        return $this->effectiftotal;
    }

    public function setEffectiftotal(int $effectiftotal): self
    {
        $this->effectiftotal = $effectiftotal;

        return $this;
    }

    public function getReferentiel(): ?Referentiel
    {
        return $this->referentiel;
    }

    public function setReferentiel(?Referentiel $referentiel): self
    {
        $this->referentiel = $referentiel;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

        return $this;
    }
}
