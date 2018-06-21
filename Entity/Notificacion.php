<?php

namespace Micayael\NotificationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="notificacion", schema="notifications")
 * @ORM\Entity()
 */
class Notificacion
{
    const TYPE_APP = 2;
    const TYPE_EMAIL = 4;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="json_unicode")
     */
    private $detalle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emisorTipo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $emisorId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $receptorTipo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $receptorId;

    /**
     * @ORM\Column(type="boolean")
     */
    private $leido = false;

    /**
     * @ORM\Column(type="integer")
     */
    private $tipo;

    public function getId()
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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getDetalle()
    {
        return $this->detalle;
    }

    public function setDetalle($detalle): self
    {
        $this->detalle = $detalle;

        return $this;
    }

    public function getEmisorTipo(): ?string
    {
        return $this->emisorTipo;
    }

    public function setEmisorTipo(?string $emisorTipo): self
    {
        $this->emisorTipo = $emisorTipo;

        return $this;
    }

    public function getEmisorId(): ?string
    {
        return $this->emisorId;
    }

    public function setEmisorId(?string $emisorId): self
    {
        $this->emisorId = $emisorId;

        return $this;
    }

    public function getReceptorTipo(): ?string
    {
        return $this->receptorTipo;
    }

    public function setReceptorTipo(string $receptorTipo): self
    {
        $this->receptorTipo = $receptorTipo;

        return $this;
    }

    public function getReceptorId(): ?string
    {
        return $this->receptorId;
    }

    public function setReceptorId(string $receptorId): self
    {
        $this->receptorId = $receptorId;

        return $this;
    }

    public function getLeido(): ?bool
    {
        return $this->leido;
    }

    public function setLeido(bool $leido): self
    {
        $this->leido = $leido;

        return $this;
    }

    public function getTipo(): ?int
    {
        return $this->tipo;
    }

    public function setTipo(int $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}
