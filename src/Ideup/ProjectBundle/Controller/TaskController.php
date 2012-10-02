<?php
// src/Ideup/ProjectBundle/Controller/TaskController.php

namespace Ideup\ProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Ideup\ProjectBundle\Entity\Message;
use Ideup\ProjectBundle\Entity\Project;
use Ideup\ProjectBundle\Entity\Task;
use Ideup\ProjectBundle\Entity\Developer;
use Ideup\ProjectBundle\Form\MessageType;
use Ideup\ProjectBundle\Form\TaskType;

class TaskController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $ok = $this->getRequest()->query->get('ok');
        if ($ok)    $ok = 'Mensaje enviado correctamente';
        if ($ok && $ok==false)      $ok = 'Error enviado mensaje';
        $task_list = $em->getRepository('IdeupProjectBundle:Task')->findAll();
        return $this->render('IdeupProjectBundle:Task:tasks.html.twig', array(
                'tasks' => $task_list,
                'notification'=> $ok )  
        );
    }
	
	public function taskAction($task_id)
	{
       $em = $this->getDoctrine()->getEntityManager();

       $task = $em->getRepository('IdeupProjectBundle:Task')->find($task_id);
       $message = new Message();
       $form = $this->createForm(new MessageType());

       $list_messages = $em->getRepository('IdeupProjectBundle:Message')->findByTask((int)$task_id);

       return $this->render('IdeupProjectBundle:Task:task.html.twig', array(
               'form' => $form->createView(),
               'task' => $task,
               'sms' => $list_messages
       ));
	}


    public function addTaskAction(){
        $request = $this->getRequest();
        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);

        if ($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($task);
                $em->flush();
                return $this->redirect($this->generateUrl('IdeupProjectBundle_listTasks'));
            }
        }
        return $this->render('IdeupProjectBundle:Task:addTask.html.twig', array(
            'form' => $form->createView()
       ));
    }


    public function newTaskAction(){

        $em = $this->getDoctrine()->getEntityManager();
        
		$form = $this->createForm(new TaskType());
        return $this->render('IdeupProjectBundle:Task:addTask.html.twig', array(
                'form' => $form->createView()
        ));

    }

}
