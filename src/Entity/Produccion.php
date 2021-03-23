<?php

namespace App\Entity;

use App\Repository\ProduccionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduccionRepository::class)
 */
class Produccion
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
    private $embalaje;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $laminas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mecanica;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $transporte;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $referencia;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="time")
     */
    private $horaCreacion;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaInicio;

    /**
     * @ORM\Column(type="time")
     */
    private $horaInicio;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaFin;

    /**
     * @ORM\Column(type="time")
     */
    private $horaFin;

    /**
     * @ORM\Column(type="integer")
     */
    private $tiempoTotal;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUsuario;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idCliente;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmbalaje(): ?string
    {
        return $this->embalaje;
    }

    public function setEmbalaje(string $embalaje): self
    {
        $this->embalaje = $embalaje;

        return $this;
    }

    public function getLaminas(): ?string
    {
        return $this->laminas;
    }

    public function setLaminas(string $laminas): self
    {
        $this->laminas = $laminas;

        return $this;
    }

    public function getMecanica(): ?string
    {
        return $this->mecanica;
    }

    public function setMecanica(string $mecanica): self
    {
        $this->mecanica = $mecanica;

        return $this;
    }

    public function getTransporte(): ?string
    {
        return $this->transporte;
    }

    public function setTransporte(string $transporte): self
    {
        $this->transporte = $transporte;

        return $this;
    }

    public function getReferencia(): ?string
    {
        return $this->referencia;
    }

    public function setReferencia(string $referencia): self
    {
        $this->referencia = $referencia;

        return $this;
    }

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getHoraCreacion(): ?\DateTimeInterface
    {
        return $this->horaCreacion;
    }

    public function setHoraCreacion(\DateTimeInterface $horaCreacion): self
    {
        $this->horaCreacion = $horaCreacion;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio(\DateTimeInterface $fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getHoraInicio(): ?\DateTimeInterface
    {
        return $this->horaInicio;
    }

    public function setHoraInicio(\DateTimeInterface $horaInicio): self
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    public function getHoraFin(): ?\DateTimeInterface
    {
        return $this->horaFin;
    }

    public function setHoraFin(\DateTimeInterface $horaFin): self
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    public function getTiempoTotal(): ?int
    {
        return $this->tiempoTotal;
    }

    public function setTiempoTotal(int $tiempoTotal): self
    {
        $this->tiempoTotal = $tiempoTotal;

        return $this;
    }

    public function getIdUsuario(): ?usuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?usuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdCliente(): ?cliente
    {
        return $this->idCliente;
    }

    public function setIdCliente(?cliente $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }
}
