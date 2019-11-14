<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MenuRepository")
 */
class Menu
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
    private $nommenu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNommenu(): ?string
    {
        return $this->nommenu;
    }

    public function setNommenu(string $nommenu): self
    {
        $this->nommenu = $nommenu;

        return $this;
    }
}
