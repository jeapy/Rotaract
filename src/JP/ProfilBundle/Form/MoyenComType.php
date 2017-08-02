<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class MoyenComType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

                ->add('designation', ChoiceType::class, array(
                        'choices' => array('Email' => 'Email',
                                          'SMS' => 'SMS',
                                          'Appel Telephonique' => 'Appel Telephonique',
                                          'Whatsapp' => 'Whatsapp',
                                          'Autre' => 'Autre',
                                 ),
                     'label'=> 'Moyen de communication privilégié',
                     'empty_data'=> '',
                     'placeholder'=> 'Aucun',
                     
                     
                            )
                    )

                ->add('valeur',TextType::class);
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ProfilBundle\Entity\MoyenCom'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_moyencom';
    }


}
