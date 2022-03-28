<?php

namespace App\Entity;

use App\Repository\GenerosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenerosRepository::class)
 */
class Generos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombreGeneros;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Canciones", mappedBy="generos")
     */
    private $canciones;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreGeneros(): ?string
    {
        return $this->nombreGeneros;
    }

    public function setNombreGeneros(?string $nombreGeneros): self
    {
        $this->nombreGeneros = $nombreGeneros;

        return $this;
    }

    public function __construct()
    {
        $this->canciones = new ArrayCollection();
    }

    public function getProducts(): Collection
    {
        return $this->canciones;
    }
}
