<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ConjointType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                    ->add('nomprenom',TextType::class,array(
                                'label' => 'Nom du conjoint',
                                'required' => false
                                 )
                        )
                    ->add('datenaissance',DateType::class, array(
                                'label' => 'Date Anniversaire',
                                'widget' => 'single_text',
                              'html5' => false,
                              'required' => false,
                              'attr'=> array('class'=>'js-datepicker')
                                 )
                        )

                    ->add('contact',NumberType::class,array(
                                'label' => 'Contact',
                                'required' => false
                                 )
                        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ProfilBundle\Entity\Conjoint'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_conjoint';
    }


}
