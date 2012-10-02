<?php
// src/Ideup/ProjectBundle/Form/ProjectType.php

namespace Ideup\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ProjectType extends AbstractType{
	
	public function buildForm(FormBuilderInterface $builder, array $options)
    {
			$builder->add('cordinador', 'entity', array(
					'class' => 'IdeupProjectBundle:Developer',
					'query_builder' => function(EntityRepository $er){
							return $er->createQueryBuilder('d')->orderBy('d.nombre','ASC');
					}
			));
			$builder->add('horas');

			$builder->add('precioHora');

			$builder->add('nombre');
    }

	public function getName(){
		return 'nombre';
	}
}
