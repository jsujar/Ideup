<?php
// src/Ideup/ProjectBundle/Controller/MessageController.php

namespace Ideup\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ideup\ProjectBundle\Entity\Message;
use Ideup\ProjectBundle\Entity\Developer;
use Ideup\ProjectBundle\Entity\Project;
use Ideup\ProjectBundle\Form\MessageType;

class MessageController extends Controller
{

	public function newMessageAction(){
		$message = new Message();
		$form = $his->createForm(new MessageType());
		return $this->render('IdeupProjectBundle:Project:Project.html.twig', array(
				'form' => $form->createView()
		));

	}


	public function addMessageAction(){
         $request = $this->getRequest();
         $message = new Message();
         $form = $this->createForm(new MessageType(), $message);
 
         if ($request->getMethod() == 'POST')
         {
             $form->bindRequest($request);
             if ($form->isValid())
             {
                 $em = $this->getDoctrine()->getEntityManager();
				 $em->persist($message);
                 $em->flush();
                 return $this->redirect($this->generateUrl('IdeupProjectBundle_listTasks'));
             }
         }
         return $this->render('IdeupProjectBundle:Project:Project.html.twig', array(
             'form' => $form->createView()
        ));
	}
}
