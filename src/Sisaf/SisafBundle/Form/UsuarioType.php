<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('apellidoma')
            ->add('apellidopa')
            ->add('username')
            ->add('password', 'password')
            ->add('email', 'email')
            
            ->add('colonia')
            ->add('calle')
            ->add('numero')
            ->add('edificio')
            ->add('piso')
            ->add('departamento')
            ->add('telefono', 'integer', array('max_length'=>15))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_usuariotype';
    }
}
