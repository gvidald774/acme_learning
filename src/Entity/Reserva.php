<?php

namespace App\Entity;

use App\Repository\ReservaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservaRepository::class)]
class Reserva
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Aula::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $id_aula;

    #[ORM\ManyToOne(targetEntity: Grupo::class, inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_grupo;

    #[ORM\ManyToOne(targetEntity: Tramo::class, inversedBy: 'reservas')]
    #[ORM\JoinColumn(nullable: true)]
    private $id_tramo;

    #[ORM\Column(type: 'integer')]
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAula(): ?Aula
    {
        return $this->id_aula;
    }

    public function setIdAula(?Aula $id_aula): self
    {
        $this->id_aula = $id_aula;

        return $this;
    }

    public function getIdGrupo(): ?Grupo
    {
        return $this->id_grupo;
    }

    public function setIdGrupo(?Grupo $id_grupo): self
    {
        $this->id_grupo = $id_grupo;

        return $this;
    }

    public function getIdTramo(): ?Tramo
    {
        return $this->id_tramo;
    }

    public function setIdTramo(?Tramo $id_tramo): self
    {
        $this->id_tramo = $id_tramo;

        return $this;
    }

    public function getPrecio(): ?int
    {
        return $this->precio;
    }

    public function setPrecio(int $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
