<?php

namespace JP\ReunionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReunionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('datereunion',DateTimeType::class,array(

                            'label' => 'Date et Heure',
                             'widget' => 'single_text',
                             
                              'html5' => false,
                              'required' => true
                              ))

                ->add('lieu',TextType::class,array(
                                'label' => 'Lieu de la reunion'
                                     ))

                ->add('typereunion',ChoiceType::class,array(
                            'choices' => array('Ordinaire' => "Ordinaire",
                                               'Extraordinaire' => "Extraordinaire",
                                               'Autre'=> "Autre"
                                             ),
                             'label'=> 'Type de Reunion',
                            
                 ))

                ->add('objet',TextareaType::class ,array(
                                'label' => 'Ordre du jour'
                                     ))

                 ->add('save',SubmitType::class,array(

                   'attr' =>  array( 'class'=> 'btn btn-success btn-lg')))
                ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ReunionBundle\Entity\Reunion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_reunionbundle_reunion';
    }


}
