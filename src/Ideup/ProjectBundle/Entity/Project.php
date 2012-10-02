<?php
// src/Ideup/ProjectBundle/Entity/Project.php

namespace Ideup\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\ProjectBundle\Entity\IdeupProject
 *
 * @ORM\Table(name="ideup_project")
 * @ORM\Entity
 */
class Project
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $nombre
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @var integer $cordinador
     *
     * @ORM\Column(name="cordinador", type="integer", nullable=true)
     */
    private $cordinador;

    /**
     * @var integer $horas
     *
     * @ORM\Column(name="horas", type="integer", nullable=true)
     */
    private $horas;

    /**
     * @var integer $precioHora
     *
     * @ORM\Column(name="precio_hora", type="integer", nullable=true)
     */
    private $precioHora;



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
     * @return Project
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
     * Set cordinador
     *
     * @param integer $cordinador
     * @return Project
     */
    public function setCordinador($cordinador)
    {
        $this->cordinador = $cordinador;
    
        return $this;
    }

    /**
     * Get cordinador
     *
     * @return integer 
     */
    public function getCordinador()
    {
        return $this->cordinador;
    }

    /**
     * Set horas
     *
     * @param integer $horas
     * @return Project
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;
    
        return $this;
    }

    /**
     * Get horas
     *
     * @return integer 
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * Set precioHora
     *
     * @param integer $precioHora
     * @return Project
     */
    public function setPrecioHora($precioHora)
    {
        $this->precioHora = $precioHora;
    
        return $this;
    }

    /**
     * Get precioHora
     *
     * @return integer 
     */
    public function getPrecioHora()
    {
        return $this->precioHora;
	}

	public function __toString(){
		return $this->nombre;
	}
}
