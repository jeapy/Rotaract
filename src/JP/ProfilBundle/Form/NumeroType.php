<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\NumberType;

class NumeroType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

                ->add('operateur', ChoiceType::class, array(
                'choices' => array('Orange' => 1,
                                  'MTN' => 2,
                                  'Moov' => 3,                               
                                 ),
                 'label'=> 'Operateur',
                 'attr'=> array('class'=> 'form-control')
                 
                        )
                    )

                ->add('valeur',NumberType::class,array(               
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
            'data_class' => 'JP\ProfilBundle\Entity\Numero'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_numero';
    }


}
