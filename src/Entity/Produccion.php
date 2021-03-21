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
    private $fecha_creacion;

    /**
     * @ORM\Column(type="time")
     */
    private $hora_creacion;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_inicio;

    /**
     * @ORM\Column(type="time")
     */
    private $hora_inicio;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha_fin;

    /**
     * @ORM\Column(type="time")
     */
    private $hora_fin;

    /**
     * @ORM\Column(type="integer")
     */
    private $tiempo_total;

    /**
     * @ORM\ManyToOne(targetEntity=usuario::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_usuario;

    /**
     * @ORM\ManyToOne(targetEntity=cliente::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_cliente;

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
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fecha_creacion): self
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }

    public function getHoraCreacion(): ?\DateTimeInterface
    {
        return $this->hora_creacion;
    }

    public function setHoraCreacion(\DateTimeInterface $hora_creacion): self
    {
        $this->hora_creacion = $hora_creacion;

        return $this;
    }

    public function getFechaInicio(): ?\DateTimeInterface
    {
        return $this->fecha_inicio;
    }

    public function setFechaInicio(\DateTimeInterface $fecha_inicio): self
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    public function getHoraInicio(): ?\DateTimeInterface
    {
        return $this->hora_inicio;
    }

    public function setHoraInicio(\DateTimeInterface $hora_inicio): self
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fecha_fin;
    }

    public function setFechaFin(\DateTimeInterface $fecha_fin): self
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }

    public function getHoraFin(): ?\DateTimeInterface
    {
        return $this->hora_fin;
    }

    public function setHoraFin(\DateTimeInterface $hora_fin): self
    {
        $this->hora_fin = $hora_fin;

        return $this;
    }

    public function getTiempoTotal(): ?int
    {
        return $this->tiempo_total;
    }

    public function setTiempoTotal(int $tiempo_total): self
    {
        $this->tiempo_total = $tiempo_total;

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

    public function getIdCliente(): ?cliente
    {
        return $this->id_cliente;
    }

    public function setIdCliente(?cliente $id_cliente): self
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }
}
