<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstadoFinancieroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Cuotas')
            ->add('Ingresos')
            ->add('Egresos')
            ->add('GastosFijos')
            ->add('Presupuestos')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\EstadoFinanciero'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_estadofinancierotype';
    }
}
