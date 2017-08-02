<?php

namespace JP\ProfilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Doctrine\ORM\EntityRepository;

class ProfilType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
 //             ->add('code')
                ->add('nom',TextType::class)

                ->add('prenom',TextType::class)

                ->add('datenaiss',DateType::class,array(
                            'label' => 'Date de naissance',
                             'widget' => 'single_text',
                             
                              'html5' => false,
                              'required' => true
                              )
                    )

                ->add('file', FileType::class,array(
                            'label' => 'Photo de profil',
                            'required' => false
                            )
                    )

            

                ->add('domicile',TextType::class,array(
                            'label' => 'Lieu d habitation', 
                              'required' => true
                            )
                    )

                ->add('entrecole',TextType::class,array(
                    'required' => true))

                ->add('datintro',DateType::class,array(
                            'label' => 'Date d intronisation', 
                             'widget' => 'single_text',
                              'html5' => false,
                               'required' => false
                            )
                    )

                ->add('postprecedent',TextType::class,array(
                            'label' => 'Poste Precedent',
                             'required' => false
                            )
                    )

                ->add('postactuel',TextType::class,array(
                            'label' => 'Poste actuel',
                             'required' => false
                            )
                    )

               
       //         ->add('club',ClubType::class)

                ->add('moyencommunication', MoyenComType::class,array(
                            'label' => 'Moyen de communication privilegié',
                              'required' => true
                             
                             )
                )         


                      

                ->add('fonction',FonctionType::class,array(
                  'label' => 'Fonction',))

                ->add('conjoint',ConjointType::class)


                ->add('cotisation',CotisationType::class)

                ->add('reunion',ReunionType::class)

                


                   ->add('mail',CollectionType::class, array(
                        'label' => 'Adresse Email',
                       'entry_type'   => MailType::class,
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'by_reference' => false,
                          'required' => true )
                         )

                 ->add('disponibilite',CollectionType::class, array(
                        'label' => 'Disponibilité',
                       'entry_type'   => DisponibiliteType::class,
                        'allow_add'    => true,
                        'allow_delete' => true,
                         'by_reference' => false, 
                         'required' => true
                         )
                         )
           
                 ->add('numero', CollectionType::class, array(
                        'entry_type'   => NumeroType::class,
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'by_reference' => false,  
                        'required' => true              

                      ))

                ->add('enfant', CollectionType::class, array(
                        'entry_type'   => EnfantType::class,
                        'allow_add'    => true,
                        'allow_delete' => true,
                        'by_reference' => false,
                      ))


                  ->add('inviteby', EntityType::class, array(
                      'class'        => 'JPProfilBundle:Profil',
                      'choice_label' => 'nom',
                      'multiple'     => false,                      
                      'placeholder' => 'Choisir une personne',
                      'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                              ->Where('m.profiltype = 1')
                              ->orWhere('m.profiltype = 2 ');
    },
                      'required' => true
                    ))

                ->add('profession', EntityType::class, array(
                      'class'        => 'JPProfilBundle:Profession',
                      'choice_label' => 'designation',
                      'multiple'     => false,                    
                      'placeholder' => 'Choisir une profession',
                      'required' => true
                    ))


                 ->add('formation',EntityType::class, array(
                      'class'        => 'JPProfilBundle:Formation',
                      'choice_label' => 'designation',
                      'multiple'     => false,                    
                      'placeholder' => 'Choisir une formation',
                      'required' => true
                    ))

                 ->add('club',EntityType::class, array(
                      'class'        => 'JPProfilBundle:Club',
                      'choice_label' => 'designation',
                      'multiple'     => false,                    
                      'placeholder' => 'Choisir une club',
                      'required' => true
                    ))

                 
                ;

              
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'JP\ProfilBundle\Entity\Profil'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'jp_profilbundle_profil';
    }


}
