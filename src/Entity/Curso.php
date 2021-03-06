<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
#[Vich\Uploadable]
/**
 * @Vich\Uploadable
 */
class Curso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['curso'])]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['curso'])]
    private $titulo;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_ini_inscripcion;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_fin_inscripcion;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_ini_reclamacion;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_fin_reclamacion;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_ini_baja;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_fin_baja;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_ini_curso;

    #[ORM\Column(type: 'datetime')]
    #[Groups(['curso'])]
    private $f_fin_curso;

    #[ORM\Column(type: 'text')]
    #[Groups(['curso'])]
    private $contenido;

    #[ORM\Column(type: 'text')]
    #[Groups(['curso'])]
    private $objetivos;

    #[ORM\Column(type: 'text')]
    #[Groups(['curso'])]
    private $requisitos;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['curso'])]
    private $categoria;

    #[ORM\Column(type: 'float')]
    #[Groups(['curso'])]
    private $precio;

    #[ORM\Column(type: 'integer')]
    #[Groups(['curso'])]
    private $horas;

    #[ORM\Column(type: 'integer')]
    #[Groups(['curso'])]
    private $plazas;

    #[ORM\Column(type: 'boolean')]
    #[Groups(['curso'])]
    private $documentos;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'cursos')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['curso_profesor'])]
    #[MaxDepth(2)]
    private $profesor;

    #[ORM\Column(type: 'text')]
    #[Groups(['curso'])]
    private $descripcion;

    #[ORM\Column(type: 'string')]
    private $imagen;

    /**
     * Por lo que sea Vich no capta los atributos
     * @Vich\UploadableField(mapping="imagen_curso", fileNameProperty="imagen")
     */
    #[Vich\UploadableField(mapping: 'imagen_curso', fileNameProperty: 'imagen')]
    private $imageFile;

    public function __construct()
    {
        $this->grupos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getFIniInscripcion(): ?\DateTimeInterface
    {
        return $this->f_ini_inscripcion;
    }

    public function setFIniInscripcion(\DateTimeInterface $f_ini_inscripcion): self
    {
        $this->f_ini_inscripcion = $f_ini_inscripcion;

        return $this;
    }

    public function getFFinInscripcion(): ?\DateTimeInterface
    {
        return $this->f_fin_inscripcion;
    }

    public function setFFinInscripcion(\DateTimeInterface $f_fin_inscripcion): self
    {
        $this->f_fin_inscripcion = $f_fin_inscripcion;

        return $this;
    }

    public function getFIniReclamacion(): ?\DateTimeInterface
    {
        return $this->f_ini_reclamacion;
    }

    public function setFIniReclamacion(\DateTimeInterface $f_ini_reclamacion): self
    {
        $this->f_ini_reclamacion = $f_ini_reclamacion;

        return $this;
    }

    public function getFFinReclamacion(): ?\DateTimeInterface
    {
        return $this->f_fin_reclamacion;
    }

    public function setFFinReclamacion(\DateTimeInterface $f_fin_reclamacion): self
    {
        $this->f_fin_reclamacion = $f_fin_reclamacion;

        return $this;
    }

    public function getFIniBaja(): ?\DateTimeInterface
    {
        return $this->f_ini_baja;
    }

    public function setFIniBaja(\DateTimeInterface $f_ini_baja): self
    {
        $this->f_ini_baja = $f_ini_baja;

        return $this;
    }

    public function getFFinBaja(): ?\DateTimeInterface
    {
        return $this->f_fin_baja;
    }

    public function setFFinBaja(\DateTimeInterface $f_fin_baja): self
    {
        $this->f_fin_baja = $f_fin_baja;

        return $this;
    }

    public function getFIniCurso(): ?\DateTimeInterface
    {
        return $this->f_ini_curso;
    }

    public function setFIniCurso(\DateTimeInterface $f_ini_curso): self
    {
        $this->f_ini_curso = $f_ini_curso;

        return $this;
    }

    public function getFFinCurso(): ?\DateTimeInterface
    {
        return $this->f_fin_curso;
    }

    public function setFFinCurso(\DateTimeInterface $f_fin_curso): self
    {
        $this->f_fin_curso = $f_fin_curso;

        return $this;
    }

    public function getContenido(): ?string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): self
    {
        $this->contenido = $contenido;

        return $this;
    }

    public function getObjetivos(): ?string
    {
        return $this->objetivos;
    }

    public function setObjetivos(string $objetivos): self
    {
        $this->objetivos = $objetivos;

        return $this;
    }

    public function getRequisitos(): ?string
    {
        return $this->requisitos;
    }

    public function setRequisitos(string $requisitos): self
    {
        $this->requisitos = $requisitos;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }

    public function getHoras(): ?int
    {
        return $this->horas;
    }

    public function setHoras(int $horas): self
    {
        $this->horas = $horas;

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

    public function getDocumentos(): ?bool
    {
        return $this->documentos;
    }

    public function setDocumentos(bool $documentos): self
    {
        $this->documentos = $documentos;

        return $this;
    }

    public function getProfesor(): ?User
    {
        return $this->profesor;
    }

    public function setProfesor(?User $profesor): self
    {
        $this->profesor = $profesor;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;
    }

    public function __toString(): string
    {
        return $this->titulo;
    }
}
