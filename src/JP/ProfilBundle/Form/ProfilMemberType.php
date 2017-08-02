<?php


namespace JP\ProfilBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class ProfilMemberType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    		->remove('inviteby')
    		->remove('cotisation')
    		->remove('reunion')  
         ->remove('club')

         ->add('profiltype',ChoiceType::class, array(
                'choices' => array('MEMBRE' => 1,
                                  'POSTULANT' => 2                                  
                                 ),
                 'label'=> 'Type de profil',
                 'empty_data'=> '',
                 'placeholder'=> 'Choisir votre profil',
                 'required' => true,
                 ))
         ->add('save',SubmitType::class,array(
                    'attr'=>array('class'=>'btn btn-success')))
        		;
  }


  public function getParent()
  {
    return ProfilType::class;

  }

}

