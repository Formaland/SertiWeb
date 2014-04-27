<?php

namespace Pfe\Bundle\ToolBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Pfe\Bundle\ToolBundle\Entity\CheckList;
use Doctrine\ORM\EntityRepository;

class CheckListType extends AbstractType
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
            ->add('ch', 'text', array('label'     => 'CH','required'  => false,))
            ->add('cb', 'text', array('label'     => 'CB','required'  => false,))
            ->add('attributif', 'checkbox', array('label'     => 'Attributif','required'  => false,))
            ->add('abstreifer', 'checkbox', array('label'     => 'Abstreifer','required'  => false,))
            ->add('guideFinger', 'checkbox', array('label'     => 'Guide Finger','required'  => false,))
            ->add('messer', 'checkbox', array('label'     => 'Messer','required'  => false,))
            ->add('drahtcrimp', 'checkbox', array('label'     => 'Drahtcrimp','required'  => false,))
            ->add('isocrimp', 'checkbox', array('label'     => 'Isocrimp','required'  => false,))
            ->add('ambos', 'checkbox', array('label'     => 'Ambos','required'  => false,))
            ->add('cale', 'checkbox', array('label'     => 'Cale','required'  => false,))
            ->add('niederhalter', 'checkbox', array('label'     => 'CH','required'  => false,))
            ->add('position', 'checkbox', array('label'     => 'Position','required'  => false,))
            ->add('fpr', 'checkbox', array('label'     => 'F.P.R','required'  => false,))
            ->add('pdek', 'checkbox', array('label'     => 'P.D.E.K','required'  => false,))
            ->add('lpr', 'checkbox', array('label'     => 'L.P.R','required'  => false,))
            ->add('annexe5', 'checkbox', array('label'     => 'Annexe 5','required'  => false,))
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
