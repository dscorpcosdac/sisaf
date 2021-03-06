<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AreasComunesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nombre', 'entity', array(
                'class' => 'SisafBundle:AdminAreasComunes',
                'property' => 'Area',
                ))
            ->add('Persona', 'text', array('read_only' =>'true'))
            ->add('Fecha')
            ->add('FechaRegistro')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\AreasComunes'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_areascomunestype';
    }
}
