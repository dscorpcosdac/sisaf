<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class IngresosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Tipo', 'choice', array(
                'choices'   => array(
                    'Fijo' => 'Fijo', 
                    'Variable' => 'Variable',
                    'Cuota' => 'Cuota'
                    ),
                'required'  => true,
                ))
            ->add('Fecha')
            ->add('Descripcion')
            ->add('Monto')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Ingresos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_ingresostype';
    }
}
