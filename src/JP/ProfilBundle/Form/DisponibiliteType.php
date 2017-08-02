<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DisponibiliteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                   
        ->add('jour', ChoiceType::class, array(
                'choices' => array(
                            'En semaine' => array(
                                'Lundi' => 'Lundi',
                                  'Mardi' => 'Mardi',
                                  'Mercredi' => 'Mercredi',
                                  'Jeudi' => 4,
                                  'Vendredi' => 5,
                            ),
                            'Weekend' => array(
                                'Samedi' => 'Samedi',
                                  'Dimanche' => 'Dimanche',
                            )
                        ),
                 'label'=> 'Jour',
                 'empty_data'=> '',
                 'placeholder'=> 'Jour',
                 'required' => true,
                  'attr'=> array('class'=> 'form-control')
              
            ))

      
        ->add('heure',TimeType::class,    array(
                        'required' => true,             
                        'attr'=> array('class'=> 'form-control')
                     )
                );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ProfilBundle\Entity\Disponibilite'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_disponibilite';
    }


}
