<?php

namespace App\Entity;

use App\Repository\ReclamacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamacionRepository::class)]
class Reclamacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Plaza::class, inversedBy: 'reclamaciones')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_plaza;

    #[ORM\Column(type: 'text', nullable: true)]
    private $comentario;

    #[ORM\Column(type: 'blob', nullable: true)]
    private $documentos;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $valoracion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPlaza(): ?Plaza
    {
        return $this->id_plaza;
    }

    public function setIdPlaza(?Plaza $id_plaza): self
    {
        $this->id_plaza = $id_plaza;

        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getDocumentos()
    {
        return $this->documentos;
    }

    public function setDocumentos($documentos): self
    {
        $this->documentos = $documentos;

        return $this;
    }

    public function getValoracion(): ?int
    {
        return $this->valoracion;
    }

    public function setValoracion(?int $valoracion): self
    {
        $this->valoracion = $valoracion;

        return $this;
    }
}
