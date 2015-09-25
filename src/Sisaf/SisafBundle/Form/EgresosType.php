<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EgresosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Tipo', 'choice', array(
                'choices'   => array('Fijo' => 'Fijo', 'Variable' => 'Variable'),
                'required'  => true,
                ))
            ->add('Fecha')
            ->add('Descripcion')
            #->add('Monto')
            ->add('Monto', 'integer', array('max_length'=>15))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Egresos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_egresostype';
    }
}
