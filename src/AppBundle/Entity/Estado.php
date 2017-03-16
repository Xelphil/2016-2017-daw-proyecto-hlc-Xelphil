<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estado
 *
 * @ORM\Table(name="estado")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EstadoRepository")
 */
class Estado
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
     * @ORM\Column(name="condicion", type="string", length=255)
     */
    private $condicion;

    /**
     * @var Material[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Material",mappedBy="estados")
     */
    private  $estadom;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estadom = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set condicion
     *
     * @param string $condicion
     *
     * @return Estado
     */
    public function setCondicion($condicion)
    {
        $this->condicion = $condicion;

        return $this;
    }

    /**
     * Get condicion
     *
     * @return string
     */
    public function getCondicion()
    {
        return $this->condicion;
    }

    /**
     * Add estadom
     *
     * @param \AppBundle\Entity\Material $estadom
     *
     * @return Estado
     */
    public function addEstadom(\AppBundle\Entity\Material $estadom)
    {
        $this->estadom[] = $estadom;

        return $this;
    }

    /**
     * Remove estadom
     *
     * @param \AppBundle\Entity\Material $estadom
     */
    public function removeEstadom(\AppBundle\Entity\Material $estadom)
    {
        $this->estadom->removeElement($estadom);
    }

    /**
     * Get estadom
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstadom()
    {
        return $this->estadom;
    }
    public function __toString() {
        return $this->getCondicion();
    }
}
