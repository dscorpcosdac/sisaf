<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GastosFijosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre')
            ->add('Descripcion')
<<<<<<< HEAD
            #->add('Monto')
            ->add('Monto', 'integer', array('max_length'=>15))
=======
            ->add('Monto')
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\GastosFijos'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_gastosfijostype';
    }
}
