<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
 */
class Usuario
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
     * @ORM\Column(name="apellido", type="string", length=255)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="correo", type="string", length=255)
     */
    private $correo;

    /**
     * @var string
     *
     * @ORM\Column(name="contraseña", type="string", length=255)
     */
    private $contraseña;

    /**
     * @var bool
     *
     * @ORM\Column(name="responsable", type="boolean")
     */
    private $responsable;

    /**
     * @var Local[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Local",mappedBy="resusuario")
     */
    private $reslocal;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reslocal = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Usuario
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Usuario
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set contraseña
     *
     * @param string $contraseña
     *
     * @return Usuario
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }

    /**
     * Get contraseña
     *
     * @return string
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set responsable
     *
     * @param boolean $responsable
     *
     * @return Usuario
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return boolean
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Add reslocal
     *
     * @param \AppBundle\Entity\Local $reslocal
     *
     * @return Usuario
     */
    public function addReslocal(\AppBundle\Entity\Local $reslocal)
    {
        $this->reslocal[] = $reslocal;

        return $this;
    }

    /**
     * Remove reslocal
     *
     * @param \AppBundle\Entity\Local $reslocal
     */
    public function removeReslocal(\AppBundle\Entity\Local $reslocal)
    {
        $this->reslocal->removeElement($reslocal);
    }

    /**
     * Get reslocal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReslocal()
    {
        return $this->reslocal;
    }
}
