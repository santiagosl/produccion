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
     * 
     */
    private $embalaje;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */
    private $laminas;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */
    private $mecanica;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */
    private $transporte;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     * 
     */
    private $referencia;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

     /**
     * @ORM\Column(type="datetime",nullable=true)
     * 
     */
    private $fechaFin;


    /**
     * @ORM\Column(type="integer",nullable=true)
     * 
     */
    private $tiempoTotal;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     * 
     */
    private $idUsuario;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class)
     * 
     */
    private $idCliente;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaInicioMecanica;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaFinMecanica;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaInicioLaminas;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaFinLaminas;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaInicioEmbalaje;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaFinEmbalaje;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaInicioTransporte;


    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaFinTransporte;


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

    /**
     * @ORM\Column(type="string", length=2, nullable=true)
     */
    private $finalizado;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     */
    private $usuarioFinLaminas;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     */
    private $usuarioFinMecanica;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     */
    private $usuarioFinEmbalaje;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class)
     */
    private $usuarioFinTransporte;


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


    public function getFechaFin(): ?\DateTimeInterface
    {
        return $this->fechaFin;
    }

    public function setFechaFin(\DateTimeInterface $fechaFin): self
    {
        $this->fechaFin = $fechaFin;

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


      public function getFechaFinMecanica(): ?\DateTimeInterface
      {
          return $this->fechaFinMecanica;
      }

      public function setFechaFinMecanica(?\DateTimeInterface $fechaFinMecanica): self
      {
          $this->fechaFinMecanica = $fechaFinMecanica;

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


      public function getFechaFinLaminas(): ?\DateTimeInterface
      {
          return $this->fechaFinLaminas;
      }

      public function setFechaFinLaminas(?\DateTimeInterface $fechaFinLaminas): self
      {
          $this->fechaFinLaminas = $fechaFinLaminas;

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


      public function getFechaFinEmbalaje(): ?\DateTimeInterface
      {
          return $this->fechaFinEmbalaje;
      }

      public function setFechaFinEmbalaje(?\DateTimeInterface $fechaFinEmbalaje): self
      {
          $this->fechaFinEmbalaje = $fechaFinEmbalaje;

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

      public function getFechaFinTransporte(): ?\DateTimeInterface
      {
          return $this->fechaFinTransporte;
      }

      public function setFechaFinTransporte(?\DateTimeInterface $fechaFinTransporte): self
      {
          $this->fechaFinTransporte = $fechaFinTransporte;

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

      public function getFinalizado(): ?string
      {
          return $this->finalizado;
      }

      public function setFinalizado(?string $finalizado): self
      {
          $this->finalizado = $finalizado;

          return $this;
      }

      public function getUsuarioFinLaminas(): ?Usuario
      {
          return $this->usuarioFinLaminas;
      }

      public function setUsuarioFinLaminas(?Usuario $usuarioFinLaminas): self
      {
          $this->usuarioFinLaminas = $usuarioFinLaminas;

          return $this;
      }

      public function getUsuarioFinMecanica(): ?Usuario
      {
          return $this->usuarioFinMecanica;
      }

      public function setUsuarioFinMecanica(?Usuario $usuarioFinMecanica): self
      {
          $this->usuarioFinMecanica = $usuarioFinMecanica;

          return $this;
      }

      public function getUsuarioFinEmbalaje(): ?Usuario
      {
          return $this->usuarioFinEmbalaje;
      }

      public function setUsuarioFinEmbalaje(?Usuario $usuarioFinEmbalaje): self
      {
          $this->usuarioFinEmbalaje = $usuarioFinEmbalaje;

          return $this;
      }

      public function getUsuarioFinTransporte(): ?Usuario
      {
          return $this->usuarioFinTransporte;
      }

      public function setUsuarioFinTransporte(?Usuario $usuarioFinTransporte): self
      {
          $this->usuarioFinTransporte = $usuarioFinTransporte;

          return $this;
      }


}
