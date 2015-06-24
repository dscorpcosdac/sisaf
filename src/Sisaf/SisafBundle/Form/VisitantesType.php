<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitantesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Automovil')
            ->add('Destino', 'entity', array(
                'class' => 'SisafBundle:Usuario',
                'property' => 'casadepto',
                ))
            ->add('F_Entrada')
            ->add('H_Entrada')
            ->add('H_Salida')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Visitantes'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_visitantestype';
    }
}
