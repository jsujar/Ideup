<?php
// src/Ideup/ProjectBundle/Form/ProjectType.php

namespace Ideup\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class TaskType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
			$builder->add('developer', 'entity', array(
					'class' => 'IdeupProjectBundle:Developer',
					'query_builder' => function(EntityRepository $er){
							return $er->createQueryBuilder('d')->orderBy('d.nombre','ASC');
					}
			));
			
            $builder->add('project', 'entity', array(
                    'class' => 'IdeupProjectBundle:Project',
                    'query_builder' => function(EntityRepository $er){
                           return $er->createQueryBuilder('p')->orderBy('p.nombre','ASC');
                    }
            ));

			$builder->add('horas');

			$builder->add('descripcion');

			$builder->add('nombre');
    }

	public function getName(){
		return 'nombre';
	}
}
