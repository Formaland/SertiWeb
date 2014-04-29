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
            ->add('supplierName', 'text' ,array('label'  => 'Nom du fournisseur',))
            ->add('inventoryNumber', 'text' ,array('label'  => 'N° d\'inventaire'))
            ->add('dessin' , 'text' ,array('label'  => 'Dessin d\'ensemble & Liste PR'))
            ->add('leoniNbr', 'number', array(
            'label'  => 'N° Pièce LEONI',
            ))
            ->add('date', 'date', array(
                                                'widget' => 'single_text',
                                                'input' => 'datetime',
                                                'format' => 'dd/MM/yyyy',
                                                'attr' => array('class' => 'date'),
                                                ))
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
