<?php
// src/Ideup/ProjectBundle/Controller/DeveloperController.php

namespace Ideup\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ideup\ProjectBundle\Entity\Developer;
use Ideup\ProjectBundle\Form\MessageType;

class DeveloperController extends Controller
{
    public function indexAction()
    {
    #    return $this->render('IdeupProjectBundle:Project:index.html.twig');
	#}


	#public function listDevelopersAction(){	
		$em = $this->getDoctrine()->getEntityManager();
		$developer_list = $em->getRepository('IdeupProjectBundle:Developer')->findAll();
		return $this->render('IdeupProjectBundle:Project:developers.html.twig', array(
			'developers' => $developer_list));
	}

}
