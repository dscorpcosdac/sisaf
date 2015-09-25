<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProveedoresType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('RFC')
            ->add('Pais')
            ->add('Estatus', 'choice', array(
                'choices'   => array('Activo' => 'Activo', 'Inactivo' => 'Inactivo'),
                'required'  => true,
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Proveedores'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_proveedorestype';
    }
}
