<?php
// src/Ideup/ProjectBundle/Controller/DefaultController.php

namespace Ideup\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IdeupProjectBundle:Default:index.html.twig');
	}

	public function aboutAction(){
		return $this->render('IdeupProjectBundle:Default:about.html.twig');
	}

}
