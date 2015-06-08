<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GastosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Tipo', 'choice', array(
                'choices'   => array('Fijo' => 'Fijo', 'Variable' => 'Variable'),
                'required'  => true,
                ))
            ->add('Concepto')
            ->add('Descripcion')
            ->add('Monto')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Gastos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_gastostype';
    }
}
