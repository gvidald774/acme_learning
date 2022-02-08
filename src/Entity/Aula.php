<?php

namespace App\Entity;

use App\Repository\AulaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AulaRepository::class)]
class Aula
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 5)]
    private $codigo;

    #[ORM\Column(type: 'integer')]
    private $capacidad;

    #[ORM\Column(type: 'text')]
    private $caracteristicas;

    #[ORM\Column(type: 'float')]
    private $precio_tramo;

    #[ORM\Column(type: 'boolean')]
    private $activa;

    #[ORM\OneToMany(mappedBy: 'id_aula', targetEntity: Reserva::class)]
    private $reservas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCapacidad(): ?int
    {
        return $this->capacidad;
    }

    public function setCapacidad(int $capacidad): self
    {
        $this->capacidad = $capacidad;

        return $this;
    }

    public function getCaracteristicas(): ?string
    {
        return $this->caracteristicas;
    }

    public function setCaracteristicas(string $caracteristicas): self
    {
        $this->caracteristicas = $caracteristicas;

        return $this;
    }

    public function getPrecioTramo(): ?float
    {
        return $this->precio_tramo;
    }

    public function setPrecioTramo(float $precio_tramo): self
    {
        $this->precio_tramo = $precio_tramo;

        return $this;
    }

    public function getActiva(): ?bool
    {
        return $this->activa;
    }

    public function setActiva(bool $activa): self
    {
        $this->activa = $activa;

        return $this;
    }
}
