<?php

namespace Sisaf\SisafBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CuotasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder        
            ->add('Descripcion')         
            ->add('fechaDeInicio' ,'date', array(
                        'widget' => 'single_text','required'=>false,
                    ))
            ->add('fechaFinal', 'date', array(
                        'widget' => 'single_text','required'=>false,
                    ))
<<<<<<< HEAD
            #->add('monto','number',array('precision'=>2,'grouping'=>true))
            ->add('monto', 'integer', array('max_length'=>15))
=======
            ->add('monto','number',array('precision'=>2,'grouping'=>true))
>>>>>>> a8cfb7fd1de2239305c78222c67776e4b269bdb9
            ->add('tipo', 'choice', array(
                    'choices'  => array('1' => 'Unica', '2' => 'Recurrente')
                ));
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sisaf\SisafBundle\Entity\Cuotas'
        ));
    }

    public function getName()
    {
        return 'sisaf_sisafbundle_cuotastype';
    }
}
//SuperW@rri0rsSecur1ty2013 Dsc0rpW@rri0rs12