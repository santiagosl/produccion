<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message = "El campo no puede estar vacío")
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank(message = "El campo no puede estar vacío")
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Choice(choices = {"ROLE_ADMIN" , "ROLE_USER"}, message= "Elige un rol válido")
     */
    private $rol;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "El campo no puede estar vacío")
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=usuario::class)
     */
    private $id_usuario;

    /* --- */

    public function getUserName()
    {
        return $this->nombre;
    }

    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return array($this->rol);
    }

    public function eraseCredentials()
    {
    }

    public function serialize()
    { 
        return serialize(array($this->id, $this->nombre, $this->password)); 
    } 
    
    public function unserialize($datos_serializados) 
    { 
        list($this->id, $this->nombre, $this->password) = unserialize($datos_serializados, array('allowed_classes'=> false)); 
    }

    /* --- */

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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getRol(): ?string
    {
        return $this->rol;
    }

    public function setRol(string $rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIdUsuario(): ?usuario
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(?usuario $id_usuario): self
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }
}
