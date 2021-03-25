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
     * @ORM\Column(type="string", length=255,nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $embalaje;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $laminas;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $mecanica;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $transporte;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * @ORM\JoinColumn(nullable=true)
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
     * @ORM\Column(type="date",nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $fechaFin;

    /**
     * @ORM\Column(type="time",nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $horaFin;

    /**
     * @ORM\Column(type="integer",nullable=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $tiempoTotal;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idUsuario;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class)
     * 
     */
    private $idCliente;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaInicioMecanica;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaInicioMecanica;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaFinMecanica;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaFinMecanica;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaInicioLaminas;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaInicioLaminas;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaFinLaminas;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaFinLaminas;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaInicioEmbalaje;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaInicioEmbalaje;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaFinEmbalaje;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaFinEmbalaje;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaInicioTransporte;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaInicioTransporte;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaFinTransporte;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $horaFinTransporte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tiempoMecanica;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tiempoLaminas;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tiempoEmbalaje;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tiempoTransporte;


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

    public function getIdUsuario(): ?Usuario
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?Usuario $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getIdCliente(): ?Cliente
    {
        return $this->idCliente;
    }

    public function setIdCliente(?Cliente $idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

      public function __toString() {
        return $this->idCliente;
    }

      public function getFechaInicioMecanica(): ?\DateTimeInterface
      {
          return $this->fechaInicioMecanica;
      }

      public function setFechaInicioMecanica(?\DateTimeInterface $fechaInicioMecanica): self
      {
          $this->fechaInicioMecanica = $fechaInicioMecanica;

          return $this;
      }

      public function getHoraInicioMecanica(): ?\DateTimeInterface
      {
          return $this->horaInicioMecanica;
      }

      public function setHoraInicioMecanica(?\DateTimeInterface $horaInicioMecanica): self
      {
          $this->horaInicioMecanica = $horaInicioMecanica;

          return $this;
      }

      public function getFechaFinMecanica(): ?\DateTimeInterface
      {
          return $this->fechaFinMecanica;
      }

      public function setFechaFinMecanica(?\DateTimeInterface $fechaFinMecanica): self
      {
          $this->fechaFinMecanica = $fechaFinMecanica;

          return $this;
      }

      public function getHoraFinMecanica(): ?\DateTimeInterface
      {
          return $this->horaFinMecanica;
      }

      public function setHoraFinMecanica(?\DateTimeInterface $horaFinMecanica): self
      {
          $this->horaFinMecanica = $horaFinMecanica;

          return $this;
      }

      public function getFechaInicioLaminas(): ?\DateTimeInterface
      {
          return $this->fechaInicioLaminas;
      }

      public function setFechaInicioLaminas(?\DateTimeInterface $fechaInicioLaminas): self
      {
          $this->fechaInicioLaminas = $fechaInicioLaminas;

          return $this;
      }

      public function getHoraInicioLaminas(): ?\DateTimeInterface
      {
          return $this->horaInicioLaminas;
      }

      public function setHoraInicioLaminas(?\DateTimeInterface $horaInicioLaminas): self
      {
          $this->horaInicioLaminas = $horaInicioLaminas;

          return $this;
      }

      public function getFechaFinLaminas(): ?\DateTimeInterface
      {
          return $this->fechaFinLaminas;
      }

      public function setFechaFinLaminas(?\DateTimeInterface $fechaFinLaminas): self
      {
          $this->fechaFinLaminas = $fechaFinLaminas;

          return $this;
      }

      public function getHoraFinLaminas(): ?\DateTimeInterface
      {
          return $this->horaFinLaminas;
      }

      public function setHoraFinLaminas(?\DateTimeInterface $horaFinLaminas): self
      {
          $this->horaFinLaminas = $horaFinLaminas;

          return $this;
      }

      public function getFechaInicioEmbalaje(): ?\DateTimeInterface
      {
          return $this->fechaInicioEmbalaje;
      }

      public function setFechaInicioEmbalaje(?\DateTimeInterface $fechaInicioEmbalaje): self
      {
          $this->fechaInicioEmbalaje = $fechaInicioEmbalaje;

          return $this;
      }

      public function getHoraInicioEmbalaje(): ?\DateTimeInterface
      {
          return $this->horaInicioEmbalaje;
      }

      public function setHoraInicioEmbalaje(?\DateTimeInterface $horaInicioEmbalaje): self
      {
          $this->horaInicioEmbalaje = $horaInicioEmbalaje;

          return $this;
      }

      public function getFechaFinEmbalaje(): ?\DateTimeInterface
      {
          return $this->fechaFinEmbalaje;
      }

      public function setFechaFinEmbalaje(?\DateTimeInterface $fechaFinEmbalaje): self
      {
          $this->fechaFinEmbalaje = $fechaFinEmbalaje;

          return $this;
      }

      public function getHoraFinEmbalaje(): ?\DateTimeInterface
      {
          return $this->horaFinEmbalaje;
      }

      public function setHoraFinEmbalaje(?\DateTimeInterface $horaFinEmbalaje): self
      {
          $this->horaFinEmbalaje = $horaFinEmbalaje;

          return $this;
      }

      public function getFechaInicioTransporte(): ?\DateTimeInterface
      {
          return $this->fechaInicioTransporte;
      }

      public function setFechaInicioTransporte(\DateTimeInterface $fechaInicioTransporte): self
      {
          $this->fechaInicioTransporte = $fechaInicioTransporte;

          return $this;
      }

      public function getHoraInicioTransporte(): ?\DateTimeInterface
      {
          return $this->horaInicioTransporte;
      }

      public function setHoraInicioTransporte(?\DateTimeInterface $horaInicioTransporte): self
      {
          $this->horaInicioTransporte = $horaInicioTransporte;

          return $this;
      }

      public function getFechaFinTransporte(): ?\DateTimeInterface
      {
          return $this->fechaFinTransporte;
      }

      public function setFechaFinTransporte(?\DateTimeInterface $fechaFinTransporte): self
      {
          $this->fechaFinTransporte = $fechaFinTransporte;

          return $this;
      }

      public function getHoraFinTransporte(): ?\DateTimeInterface
      {
          return $this->horaFinTransporte;
      }

      public function setHoraFinTransporte(?\DateTimeInterface $horaFinTransporte): self
      {
          $this->horaFinTransporte = $horaFinTransporte;

          return $this;
      }

      public function getTiempoMecanica(): ?string
      {
          return $this->tiempoMecanica;
      }

      public function setTiempoMecanica(?string $tiempoMecanica): self
      {
          $this->tiempoMecanica = $tiempoMecanica;

          return $this;
      }

      public function getTiempoLaminas(): ?string
      {
          return $this->tiempoLaminas;
      }

      public function setTiempoLaminas(?string $tiempoLaminas): self
      {
          $this->tiempoLaminas = $tiempoLaminas;

          return $this;
      }

      public function getTiempoEmbalaje(): ?string
      {
          return $this->tiempoEmbalaje;
      }

      public function setTiempoEmbalaje(?string $tiempoEmbalaje): self
      {
          $this->tiempoEmbalaje = $tiempoEmbalaje;

          return $this;
      }

      public function getTiempoTransporte(): ?string
      {
          return $this->tiempoTransporte;
      }

      public function setTiempoTransporte(?string $tiempoTransporte): self
      {
          $this->tiempoTransporte = $tiempoTransporte;

          return $this;
      }


}
