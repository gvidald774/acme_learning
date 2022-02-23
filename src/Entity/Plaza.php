<?php

namespace App\Entity;

use App\Repository\PlazaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: PlazaRepository::class)]
#[Vich\Uploadable]
class Plaza
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'plazas')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_alumno;

    #[ORM\ManyToOne(targetEntity: Curso::class, inversedBy: 'plazas_array')]
    #[ORM\JoinColumn(nullable: false)]
    private $id_curso;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $puesto;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $valoracion;

    #[ORM\Column(type: 'array', nullable: true)]
    private $documentos;

    /**
     * Por lo que sea Vich no está actualizado a los atributos (?) excepto que en la documentación pone que sí (??) pero vamos a mí no me ha funcionado (???)
     * @Vich\UploadableField(mapping="archivos_plaza",fileNameProperty="documentos")
     */
    #[Vich\UploadableField(mapping: 'archivos_plaza', fileNameProperty: 'documentos')]
    private $documentoFile = null;

    #[ORM\Column(type: 'string', length: 255)]
    private $estado;

    #[ORM\OneToMany(mappedBy: 'id_plaza', targetEntity: Reclamacion::class, orphanRemoval: true)]
    private $reclamaciones;

    public function __construct()
    {
        $this->reclamaciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAlumno(): ?User
    {
        return $this->id_alumno;
    }

    public function setIdAlumno(?User $id_alumno): self
    {
        $this->id_alumno = $id_alumno;

        return $this;
    }

    public function getIdCurso(): ?Curso
    {
        return $this->id_curso;
    }

    public function setIdCurso(?Curso $id_curso): self
    {
        $this->id_curso = $id_curso;

        return $this;
    }

    public function getPuesto(): ?int
    {
        return $this->puesto;
    }

    public function setPuesto(?int $puesto): self
    {
        $this->puesto = $puesto;

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

    public function getDocumentos()
    {
        return $this->documentos;
    }

    public function setDocumentos($documentos): self
    {
        $this->documentos = $documentos;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getDocumentoFile(): ?File
    {
        return $this->documentoFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setDocumentoFile(?File $documentoFile = null): void
    {
        $this->documentoFile = $documentoFile;
    }

    /**
     * @return Collection|Reclamacion[]
     */
    public function getReclamaciones(): Collection
    {
        return $this->reclamaciones;
    }

    public function addReclamacione(Reclamacion $reclamacione): self
    {
        if (!$this->reclamaciones->contains($reclamacione)) {
            $this->reclamaciones[] = $reclamacione;
            $reclamacione->setIdPlaza($this);
        }

        return $this;
    }

    public function removeReclamacione(Reclamacion $reclamacione): self
    {
        if ($this->reclamaciones->removeElement($reclamacione)) {
            // set the owning side to null (unless already changed)
            if ($reclamacione->getIdPlaza() === $this) {
                $reclamacione->setIdPlaza(null);
            }
        }

        return $this;
    }
}
