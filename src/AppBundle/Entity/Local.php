<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table(name="local")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocalRepository")
 */
class Local
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="emplazamiento_local", type="string", length=255)
     */
    private $emplazamientoLocal;

    /**
     * @var Articulos
     * @ORM\JoinColumn(nullable=false)
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Articulo",mappedBy="ubicacion")
     */
    private $ubicacionArticulos;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Local
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set emplazamientoLocal
     *
     * @param string $emplazamientoLocal
     *
     * @return Local
     */
    public function setEmplazamientoLocal($emplazamientoLocal)
    {
        $this->emplazamientoLocal = $emplazamientoLocal;

        return $this;
    }

    /**
     * Get emplazamientoLocal
     *
     * @return string
     */
    public function getEmplazamientoLocal()
    {
        return $this->emplazamientoLocal;
    }

    /**
     * Set ubicacionArticulos
     *
     * @param string $ubicacionArticulos
     *
     * @return Local
     */
    public function setUbicacionArticulos($ubicacionArticulos)
    {
        $this->ubicacionArticulos = $ubicacionArticulos;

        return $this;
    }

    /**
     * Get ubicacionArticulos
     *
     * @return string
     */
    public function getUbicacionArticulos()
    {
        return $this->ubicacionArticulos;
    }
}

