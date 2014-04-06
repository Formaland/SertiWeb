<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ToolType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('toolname')
            ->add('supplierName')
            ->add('inventoryNumber')
            ->add('leoniNbr')
            ->add('date')
            ->add('enabled')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Pfe\Bundle\ToolBundle\Entity\Tool'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'pfe_bundle_toolbundle_tool';
    }
}
