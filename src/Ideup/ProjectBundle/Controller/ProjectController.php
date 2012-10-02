<?php
// src/Ideup/ProjectBundle/Controller/ProjectController.php

namespace Ideup\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ideup\ProjectBundle\Entity\Message;
use Ideup\ProjectBundle\Entity\Project;
use Ideup\ProjectBundle\Entity\Task;
use Ideup\ProjectBundle\Form\MessageType;
use Ideup\ProjectBundle\Form\TaskType;
use Ideup\ProjectBundle\Form\ProjectType;

class ProjectController extends Controller
{
    public function indexAction()
    {
		$em = $this->getDoctrine()->getEntityManager();
		$ok = $this->getRequest()->query->get('ok');
		if ($ok) 	$ok = 'Mensaje enviado correctamente';
		if ($ok && $ok==false)  	$ok = 'Error enviado mensaje';
		$project_list = $em->getRepository('IdeupProjectBundle:Project')->findAll();
		return $this->render('IdeupProjectBundle:Project:projects.html.twig', array(
				'projects' => $project_list,
				'notification'=> $ok )	
		);
	}


	public function projectAction($project_id){
		
		$em = $this->getDoctrine()->getEntityManager();

		$project = $em->getRepository('IdeupProjectBundle:Project')->find((int)$project_id);

		$task = new Task();
		$form = $this->createForm(new TaskType());

		$list_task = $em->getRepository('IdeupProjectBundle:Task')->findByProject((int)$project_id);

		return $this->render('IdeupProjectBundle:Project:project.html.twig', array(
				'form' => $form->createView(),
				'project' => $project,
				'task' => $list_task
		));

	}

	public function addProjectAction(){
	    $request = $this->getRequest();
	    $project = new Project();
	    $form = $this->createForm(new ProjectType(), $project);
 
	    if ($request->getMethod() == 'POST')
		{
	        $form->bindRequest($request);
	        if ($form->isValid())
	        {
	            $em = $this->getDoctrine()->getEntityManager();
	            $em->persist($project);
	            $em->flush();
	            return $this->redirect($this->generateUrl('IdeupProjectBundle_listProjects'));
	        }
	    }
	    return $this->render('IdeupProjectBundle:Project:addProject.html.twig', array(
	        'form' => $form->createView()
 	   ));
	}
	 
	
	public function newProjectAction(){
 
        $em = $this->getDoctrine()->getEntityManager();
        //$message = new Project();
        $form = $this->createForm(new ProjectType());
        return $this->render('IdeupProjectBundle:Project:addProject.html.twig', array(
                'form' => $form->createView()
        ));
 
    }

}
