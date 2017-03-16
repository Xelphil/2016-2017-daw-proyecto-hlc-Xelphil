<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Material
 *
 * @ORM\Table(name="material")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaterialRepository")
 */
class Material
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
     * @ORM\Column(name="marca", type="string", length=255)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", length=255)
     */
    private $modelo;

    /**
     * @var int
     *
     * @ORM\Column(name="numserie", type="integer")
     */
    private $numserie;

    /**
     * @var int
     *
     * @ORM\Column(name="unidades", type="integer")
     */
    private $unidades;

    /**
     * @var string
     *
     * @ORM\Column(name="provedor", type="string", length=255)
     */
    private $provedor;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", length=255)
     */
    private $ubicacion;

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
     * @var Local
     * @ORM\JoinColumn(nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Local",inversedBy="materiales")
     */

    private $locales;

    /**
     * @var Prooveedor
     * @ORM\JoinColumn(nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prooveedor",inversedBy="materialel")
     */
    private $proveedores;

    /**
     * @var Estado
     * @ORM\JoinColumn(nullable=false)
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Estado",inversedBy="estadom")
     */
    private $estados;

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
     * Set marca
     *
     * @param string $marca
     *
     * @return Material
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Material
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set numserie
     *
     * @param integer $numserie
     *
     * @return Material
     */
    public function setNumserie($numserie)
    {
        $this->numserie = $numserie;

        return $this;
    }

    /**
     * Get numserie
     *
     * @return integer
     */
    public function getNumserie()
    {
        return $this->numserie;
    }

    /**
     * Set unidades
     *
     * @param integer $unidades
     *
     * @return Material
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

        return $this;
    }

    /**
     * Get unidades
     *
     * @return integer
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set provedor
     *
     * @param string $provedor
     *
     * @return Material
     */
    public function setProvedor($provedor)
    {
        $this->provedor = $provedor;

        return $this;
    }

    /**
     * Get provedor
     *
     * @return string
     */
    public function getProvedor()
    {
        return $this->provedor;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Material
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Material
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
     * @return Material
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
     * Set locales
     *
     * @param \AppBundle\Entity\Local $locales
     *
     * @return Material
     */
    public function setLocales(\AppBundle\Entity\Local $locales)
    {
        $this->locales = $locales;

        return $this;
    }

    /**
     * Get locales
     *
     * @return \AppBundle\Entity\Local
     */
    public function getLocales()
    {
        return $this->locales;
    }

    /**
     * Set proveedores
     *
     * @param \AppBundle\Entity\Prooveedor $proveedores
     *
     * @return Material
     */
    public function setProveedores(\AppBundle\Entity\Prooveedor $proveedores)
    {
        $this->proveedores = $proveedores;

        return $this;
    }

    /**
     * Get proveedores
     *
     * @return \AppBundle\Entity\Prooveedor
     */
    public function getProveedores()
    {
        return $this->proveedores;
    }

    /**
     * Set estados
     *
     * @param \AppBundle\Entity\Estado $estados
     *
     * @return Material
     */
    public function setEstados(\AppBundle\Entity\Estado $estados)
    {
        $this->estados = $estados;

        return $this;
    }

    /**
     * Get estados
     *
     * @return \AppBundle\Entity\Estado
     */
    public function getEstados()
    {
        return $this->estados;
    }
    public function __toString() {
        return $this->getMarca();
    }
}
