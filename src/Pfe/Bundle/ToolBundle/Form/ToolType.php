<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Pfe\Bundle\ToolBundle\Entity\Tool;

    class ToolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('toolname', 'text' ,array('label'  => 'Nom de l\'outil'))
            ->add('supplierName', 'text' ,array('label'  => 'Date du fournisseur',))
            ->add('inventoryNumber', 'text')
            ->add('leoniNbr', 'text')
            ->add('date',        'datetime',array('label'  => 'Date d\'entrée',))
            ->add('enabled' )
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
        return 'pfe_bundle_toolbundle_tooltype';
    }
}
