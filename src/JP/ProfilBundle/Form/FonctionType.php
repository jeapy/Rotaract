<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FonctionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('designation',TextType::class,array(
                    'required' => false)
                )

                 ->add('organe',EntityType::class, array(
                              'class'        => 'JPProfilBundle:Organe',
                              'choice_label' => 'designation',
                              'multiple'     => false,
                              'required'     => false,
                              'placeholder' => 'Choisir un organe',
                            )
                 );
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ProfilBundle\Entity\Fonction'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_fonction';
    }


}
