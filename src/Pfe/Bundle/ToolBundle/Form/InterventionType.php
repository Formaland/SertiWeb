<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Pfe\Bundle\ToolBundle\Entity\Intervention;
use Doctrine\ORM\EntityRepository;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref')
            ->add('date')
            ->add('contenu')
            ->add('reclam', 'entity', array(
                'class' => 'PfeToolBundle:Reclam',
                'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.reclamRef', 'ASC');
                    },))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ToolBundle\Entity\Intervention'
        ));
    }

    public function getName()
    {
        return 'pfe_bundle_toolbundle_intervention';
    }
}
