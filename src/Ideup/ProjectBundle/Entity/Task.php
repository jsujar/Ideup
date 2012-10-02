<?php
// src/Ideup/ProjectBundle/Entity/Task.php


namespace Ideup\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\ProjectBundle\Entity\IdeupTask
 *
 * @ORM\Table(name="ideup_task")
 * @ORM\Entity
 */
class Task
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=true)
     */
    private $nombre;

	/**
	 * @var integer $project
	 * 
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="id")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
	 */	
	private $project;

    /**
     * @var integer $developer
     *
     * @ORM\ManyToOne(targetEntity="Developer", inversedBy="id")
     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id")
     */
    private $developer;

    /**
     * @var string $descripcion
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @var integer $horas
     *
     * @ORM\Column(name="horas", type="integer", nullable=true)
     */
    private $horas;



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
     * @return Task
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
     * Set developer
     *
     * @param integer $developer
     * @return Task
     */
    public function setDeveloper($developer)
    {
        $this->developer = $developer;
    
        return $this;
    }

    /**
     * Get developer
     *
     * @return integer 
     */
    public function getDeveloper()
    {
        return $this->developer;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Task
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set horas
     *
     * @param integer $horas
     * @return Task
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

	public function getProject()
	{	
		return $this->project;
	}

	public function setProject($project)
	{
		$this->project = $project;
		return $this;
	}

	public function __toString(){
		return $this->nombre;
	}
}
