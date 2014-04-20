<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CheckListType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ch')
            ->add('cb')
            ->add('attributif')
            ->add('abstreifer')
            ->add('guideFinger')
            ->add('messer')
            ->add('drahtcrimp')
            ->add('isocrimp')
            ->add('ambos')
            ->add('cale')
            ->add('niederhalter')
            ->add('position')
            ->add('fpr')
            ->add('pdek')
            ->add('lpr')
            ->add('annexe5')
            ->add('date')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ToolBundle\Entity\CheckList'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_toolbundle_checklist';
    }
}
