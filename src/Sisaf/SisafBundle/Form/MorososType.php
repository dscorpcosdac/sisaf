<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MorososType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Persona', 'entity', array(
                'class' => 'SisafBundle:Usuario',
                'property' => 'username',
                ))
            ->add('Correo')
<<<<<<< HEAD
            #->add('Telefono')
            ->add('Telefono', 'integer', array('max_length'=>15))
=======
            ->add('Telefono')
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
            ->add('Residencia')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Morosos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_morosostype';
    }
}
