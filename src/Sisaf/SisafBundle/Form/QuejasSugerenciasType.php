<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuejasSugerenciasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Tipo', 'choice', array(
                'choices'   => array('Queja' => 'Queja', 'Sugerencia' => 'Sugerencia'),
                'required'  => true,
                ))
            ->add('Titulo')
            ->add('Descripcion', 'textarea' )
            ->add('Fecha')
            ->add('Hora')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\QuejasSugerencias'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_quejassugerenciastype';
    }
}
