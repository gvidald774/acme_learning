<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Validator as AcmeAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[Vich\Uploadable]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

    #[ORM\Column(type: 'json')]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\Column(type: 'string', length: 9, unique: true)]
    #[Assert\NotBlank]
    #[AcmeAssert\dni_valido(options: ['mode' => 'loose'])]
    private $dni;

    #[ORM\Column(type: 'string', length: 255)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 255)]
    private $apellido1;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $apellido2;

    #[ORM\Column(type: 'string', nullable: true)] // Change to route
    private $foto;

    #[Vich\UploadableField(mapping: 'imagen_perfil', fileNameProperty: 'foto')]
    private $imageFile = null;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $telefono;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $localidad;

    #[ORM\OneToMany(mappedBy: 'profesor', targetEntity: Curso::class)]
    private $cursos;

    #[ORM\OneToMany(mappedBy: 'id_alumno', targetEntity: Plaza::class, orphanRemoval: true)]
    private $plazas;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    #[ORM\Column(type: 'string', length: 31, nullable: true, columnDefinition: "enum('m','f','x'")]
    private $genero;

    public function __construct()
    {
        $this->cursos = new ArrayCollection();
        $this->plazas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
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

    public function getApellido1(): ?string
    {
        return $this->apellido1;
    }

    public function setApellido1(string $apellido1): self
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->apellido2;
    }

    public function setApellido2(?string $apellido2): self
    {
        $this->apellido2 = $apellido2;

        return $this;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getLocalidad(): ?string
    {
        return $this->localidad;
    }

    public function setLocalidad(?string $localidad): self
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * @return Collection|Curso[]
     */
    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function addCurso(Curso $curso): self
    {
        if (!$this->cursos->contains($curso)) {
            $this->cursos[] = $curso;
            $curso->setProfesor($this);
        }

        return $this;
    }

    public function removeCurso(Curso $curso): self
    {
        if ($this->cursos->removeElement($curso)) {
            // set the owning side to null (unless already changed)
            if ($curso->getProfesor() === $this) {
                $curso->setProfesor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plaza[]
     */
    public function getPlazas(): Collection
    {
        return $this->plazas;
    }

    public function addPlaza(Plaza $plaza): self
    {
        if (!$this->plazas->contains($plaza)) {
            $this->plazas[] = $plaza;
            $plaza->setIdAlumno($this);
        }

        return $this;
    }

    public function removePlaza(Plaza $plaza): self
    {
        if ($this->plazas->removeElement($plaza)) {
            // set the owning side to null (unless already changed)
            if ($plaza->getIdAlumno() === $this) {
                $plaza->setIdAlumno(null);
            }
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

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
        return $this->dni." - ".$this->nombre." ".$this->apellido1." ".$this->apellido2;
    }
}
