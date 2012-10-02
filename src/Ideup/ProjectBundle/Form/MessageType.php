<?php
// src/Ideup/ProjectBundle/Form/MessageType.php

namespace Ideup\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class MessageType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
			$builder->add('developer', 'entity', array(
					'class' => 'IdeupProjectBundle:Developer',
					'query_builder' => function(EntityRepository $er){
							return $er->createQueryBuilder('d')->orderBy('d.nombre','ASC');
					}
			));

			$builder->add('task', 'entity', array(
					'class' => 'IdeupProjectBundle:Task',
					'query_builder' => function(EntityRepository $er){
							return $er->createQueryBuilder('d')->orderBy('d.id', 'ASC');
					}
			));
			
			$builder->add('message');
    }

/*	
	public function setDefaultOptions(OptionResolverInterface $resolver)
	{
		$resolver->setDefatults(array(
				'data_class' => 'Ideup\ProjectBundle\Entity\Message')
		);
	}
  
	public function getDefaultOptions(array $options)
	{
		return array('data_class' => 'Ideup\ProjectBundle\Entity\Message',);
	}
 */
	public function getName(){
		return 'message';
	}
	 
}
