<?php
// src/Ideup/ProjectBundle/Entity/Message.php

namespace Ideup\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ideup\ProjectBundle\Entity\Message
 *
 * @ORM\Table(name="ideup_message")
 * @ORM\Entity
 */ 
class Message
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
     * @var integer $developer
     *
     * @ORM\ManyToOne(targetEntity="Developer", inversedBy="id")
     * @ORM\JoinColumn(name="developer_id", referencedColumnName="id")
     */
	private $developer;	

	/**
	 * @var integer $task
	 *
	 * @ORM\ManyToOne(targetEntity="Task", inversedBy="id")
	 * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
	 */
	private $task;

	/**
	 * @var string $message
	 *
	 * @ORM\Column(name="message", type="string", length=255, nullable=true)
	 */
	private $message;

	public function getId()
	{
		return $this->id;
	}

	public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
		$this->task = $task;
		return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
	{
		$this->message = $message;
		return $this;
    }


	public function getDeveloper(){
		return $this->developer;
	}

	public function setDeveloper($developer)
	{
		$this->developer = $developer;
		return $this;
	}
	
	public function __toString(){
		return $this->task. ' - '.$this->message;
	}
}
