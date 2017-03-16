<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prooveedor
 *
 * @ORM\Table(name="prooveedor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProoveedorRepository")
 */
class Prooveedor
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_alta", type="date")
     */
    private $fechaAlta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="date")
     */
    private $fechaBaja;

    /**
     * @var Material[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Material",mappedBy="proveedores")
     */
    private $materialel;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->materialel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Prooveedor
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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Prooveedor
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     *
     * @return Prooveedor
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Add materialel
     *
     * @param \AppBundle\Entity\Material $materialel
     *
     * @return Prooveedor
     */
    public function addMaterialel(\AppBundle\Entity\Material $materialel)
    {
        $this->materialel[] = $materialel;

        return $this;
    }

    /**
     * Remove materialel
     *
     * @param \AppBundle\Entity\Material $materialel
     */
    public function removeMaterialel(\AppBundle\Entity\Material $materialel)
    {
        $this->materialel->removeElement($materialel);
    }

    /**
     * Get materialel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMaterialel()
    {
        return $this->materialel;
    }
    public function __toString() {
        return $this->getNombre();
    }
}
