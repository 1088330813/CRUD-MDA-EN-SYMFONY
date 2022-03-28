<?php

namespace App\Entity;

use App\Controller\PersistirDatosController;
use App\Repository\CancionesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass=CancionesRepository::class)
 */
class Canciones
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreCancion;

    /**
     * @ORM\Column(type="string", length=400, nullable=true)
     */
    private $letra;

      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tematica;

      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tonalidad;

       /**
     * @ORM\Column(type="integer", length=5, nullable=true)
     */
    private $tempo;

      /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $genero;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Generos", inversedBy="canciones")
     */
    private $generos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreCancion(): ?string
    {
        return $this->nombreCancion;
    }

    public function setNombreCancion(string $nombreCancion): self
    {
        $this->nombreCancion = $nombreCancion;

        return $this;
    }

    public function getLetra(): ?string
    {
        return $this->letra;
    }

    public function setLetra(?string $letra): self
    {
        $this->letra = $letra;

        return $this;
    }

    public function getTematica(): ?string
    {
        return $this->tematica;
    }

    public function setTematica(?string $tematica): self
    {
        $this->tematica = $tematica;

        return $this;
    }

    public function getTonalidad(): ?string
    {
        return $this->tonalidad;
    }

    public function setTonalidad(?string $tonalidad): self
    {
        $this->tonalidad = $tonalidad;

        return $this;
    }

    public function getTempo(): ?int
    {
        return $this->tempo;
    }

    public function setTempo(?int $tempo): self
    {
        $this->tempo = $tempo;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(?string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getGeneros():int
    {
        return $this->generos;
    }

    public function setGeneros(int $generos): self
    {
        $this->generos = $generos;

        return $this;
    }

}
