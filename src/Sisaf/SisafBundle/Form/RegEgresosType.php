<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RegEgresosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Serie')
            ->add('Folio')
            ->add('Fecha')
            ->add('Proveedor')
            ->add('Nombre')
            ->add('Importe')
            ->add('Pagado')
            ->add('Saldo')
            ->add('Estatus')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\RegEgresos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_regegresostype';
    }
}
