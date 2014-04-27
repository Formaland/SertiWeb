<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Pfe\Bundle\ToolBundle\Entity\Homologation;
use Doctrine\ORM\EntityRepository;

class HomologationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tool', 'entity', array(
                'class' => 'PfeToolBundle:Tool',
                'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('s')
                            ->orderBy('s.toolname', 'ASC');
                    },))
            ->add('fil_type')
            ->add('section')
            ->add('standard')
            ->add('fil')
            ->add('filWidth')
            ->add('isolationHeight')
            ->add('isolationWidth')
            ->add('stepDch')
            ->add('stepIch')
            ->add('note')
            ->add('date')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ToolBundle\Entity\Homologation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_toolbundle_homologation';
    }
}
