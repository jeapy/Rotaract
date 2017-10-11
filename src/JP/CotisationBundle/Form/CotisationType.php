<?php

namespace JP\CotisationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CotisationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('typecotisation',ChoiceType::class,array(
                            'choices' => array('Août 2017' => "Août 2017",
                                               'Septembre 2017' => "Septembre 2017",
                                               'Octobre 2017'=> "Octobre 2017"
                                             ),
                             'label'=> 'Type de Reunion',
                            
                 ))
                ->add('montant',TextType::class,array(
                                'label' => 'Montant'
                                     ))
                ->add('save',SubmitType::class)
                                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\CotisationBundle\Entity\Cotisation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_cotisationbundle_cotisation';
    }


}
