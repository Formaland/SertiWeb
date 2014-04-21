<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Pfe\Bundle\ToolBundle\Entity\Reclam;
use Doctrine\ORM\EntityRepository;

class ReclamType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder->add('reclamRef',       'text',array('label'  => 'La référence de la réclamation',))
            ->add('sujet',     'choice',array('choices' => Reclam::getSujets(),
                'empty_value' => 'Choisissez un Sujet'))
            ->add('contenu',       'textarea',array('label'  => 'Description',))
            ->add('user', 'entity', array(
                'class' => 'PfeUserBundle:User',
                'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.username', 'ASC');
                    },))
            ->add('tool', 'entity', array(
                'class' => 'PfeToolBundle:Tool',
                'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.toolname', 'ASC');
                    },))
            ->add('reclamDate',        'datetime',array('label'  => 'Date d\'affectation',))
        ;
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ToolBundle\Entity\Reclam'
        ));
    }

    public function getName()
    {
        return 'pfe_bundle_reclambundle_reclam';
    }
}
