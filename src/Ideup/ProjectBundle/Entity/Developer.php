<?php
// src/Ideup/ProjectBundle/Entity/Developer.php

namespace Ideup\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\ProjectBundle\Entity\IdeupDeveloper
 *
 * @ORM\Table(name="ideup_developer")
 * @ORM\Entity
 */
class Developer
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
     * @return Developer
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

	public function __toString(){
		return $this->nombre;
	}
}
