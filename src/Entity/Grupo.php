<?php

namespace App\Entity;

use App\Repository\GrupoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GrupoRepository::class)]
class Grupo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\Column(type: 'integer')]
    private $plazas;

    #[ORM\ManyToOne(targetEntity: Curso::class, inversedBy: 'grupos')]
    #[ORM\JoinColumn(nullable: false)]
    private $curso;

    #[ORM\OneToMany(mappedBy: 'id_grupo', targetEntity: Reserva::class)]
    private $reservas;

    #[ORM\OneToMany(mappedBy: 'id_grupo', targetEntity: Plaza::class, orphanRemoval: true)]
    private $array_plazas;

    public function __construct()
    {
        $this->reservas = new ArrayCollection();
        $this->array_plazas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getPlazas(): ?int
    {
        return $this->plazas;
    }

    public function setPlazas(int $plazas): self
    {
        $this->plazas = $plazas;

        return $this;
    }

    public function getCurso(): ?Curso
    {
        return $this->curso;
    }

    public function setCurso(?Curso $curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * @return Collection|Reserva[]
     */
    public function getReservas(): Collection
    {
        return $this->reservas;
    }

    public function addReserva(Reserva $reserva): self
    {
        if (!$this->reservas->contains($reserva)) {
            $this->reservas[] = $reserva;
            $reserva->setIdGrupo($this);
        }

        return $this;
    }

    public function removeReserva(Reserva $reserva): self
    {
        if ($this->reservas->removeElement($reserva)) {
            // set the owning side to null (unless already changed)
            if ($reserva->getIdGrupo() === $this) {
                $reserva->setIdGrupo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plaza[]
     */
    public function getArrayPlazas(): Collection
    {
        return $this->array_plazas;
    }

    public function addArrayPlaza(Plaza $arrayPlaza): self
    {
        if (!$this->array_plazas->contains($arrayPlaza)) {
            $this->array_plazas[] = $arrayPlaza;
            $arrayPlaza->setIdGrupo($this);
        }

        return $this;
    }

    public function removeArrayPlaza(Plaza $arrayPlaza): self
    {
        if ($this->array_plazas->removeElement($arrayPlaza)) {
            // set the owning side to null (unless already changed)
            if ($arrayPlaza->getIdGrupo() === $this) {
                $arrayPlaza->setIdGrupo(null);
            }
        }

        return $this;
    }
}
