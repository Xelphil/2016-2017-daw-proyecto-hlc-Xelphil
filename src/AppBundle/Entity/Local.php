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
     * @var int
     *
     * @ORM\Column(name="planta", type="integer")
     */
    private $planta;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var Usuario[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Usuario",inversedBy="uslocal")
     */
    private $losusuario;

    /**
     * @var Material[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Material",mappedBy="locales")
     */
    private $materiales;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->losusuario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->materiales = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set planta
     *
     * @param integer $planta
     *
     * @return Local
     */
    public function setPlanta($planta)
    {
        $this->planta = $planta;

        return $this;
    }

    /**
     * Get planta
     *
     * @return integer
     */
    public function getPlanta()
    {
        return $this->planta;
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
     * Add losusuario
     *
     * @param \AppBundle\Entity\Usuario $losusuario
     *
     * @return Local
     */
    public function addLosusuario(\AppBundle\Entity\Usuario $losusuario)
    {
        $this->losusuario[] = $losusuario;

        return $this;
    }

    /**
     * Remove losusuario
     *
     * @param \AppBundle\Entity\Usuario $losusuario
     */
    public function removeLosusuario(\AppBundle\Entity\Usuario $losusuario)
    {
        $this->losusuario->removeElement($losusuario);
    }

    /**
     * Get losusuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLosusuario()
    {
        return $this->losusuario;
    }

    /**
     * Add materiale
     *
     * @param \AppBundle\Entity\Material $materiale
     *
     * @return Local
     */
    public function addMateriale(\AppBundle\Entity\Material $materiale)
    {
        $this->materiales[] = $materiale;

        return $this;
    }

    /**
     * Remove materiale
     *
     * @param \AppBundle\Entity\Material $materiale
     */
    public function removeMateriale(\AppBundle\Entity\Material $materiale)
    {
        $this->materiales->removeElement($materiale);
    }

    /**
     * Get materiales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMateriales()
    {
        return $this->materiales;
    }
}
