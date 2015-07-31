<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CuotasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Persona', 'text', array(
            'required' => true
            ))
        /*->add('Persona', 'entity', array(
                'class' => 'SisafBundle:Usuario',
                'property' => 'username',
                'required' => true,
                'expanded' => true,
                'multiple' => true,
                ))*/
            ->add('Fecha')
            ->add('Tipo', 'choice', array(
                'choices' => array('Fija' => 'Fija', 'Variable' => 'Variable'),
                'required' => true,
                ))
            ->add('Descripcion')
            ->add('Monto')
            ->add('Frecuencia')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Cuotas'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_cuotastype';
    }
}
