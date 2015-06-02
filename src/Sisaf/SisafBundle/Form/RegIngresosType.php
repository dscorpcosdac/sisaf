<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegIngresosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Folio')
            ->add('Persona')
            ->add('Nombres')
            ->add('Apellidos')
            ->add('Aporte')
            ->add('Periodo')
            ->add('No_Prorrateo')
            ->add('Importe')
            ->add('Saldo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\RegIngresos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_regingresostype';
    }
}
