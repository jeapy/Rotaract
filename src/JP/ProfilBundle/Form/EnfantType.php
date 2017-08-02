<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EnfantType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('nomprenom',TextType::class,array(
                    'required' => true,
                     'attr'=> array('class'=> 'form-control')
                        )
            )

        ->add('datenaissance',DateType::class,array( 
                      'widget' => 'single_text',
                      'html5' => false,    
                      'required' => true,
                      'input' =>'datetime',
                      'attr'=> array('class'=> 'form-control js-datepicker')
                            )
            );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ProfilBundle\Entity\Enfant'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_enfant';
    }


}
