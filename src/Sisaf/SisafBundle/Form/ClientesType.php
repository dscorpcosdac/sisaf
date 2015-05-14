<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombres')
            ->add('Apellidos')
            ->add('Tipo')
            ->add('Genero')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Clientes'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_clientestype';
    }
}
