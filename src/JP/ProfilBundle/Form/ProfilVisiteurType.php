<?php

namespace JP\ProfilBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class ProfilVisiteurType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder   
              ->remove('code')               

                ->remove('datenaiss')

                ->remove('file' )
           

                ->remove('domicile' )

                ->remove('entrecole')

                ->remove('datintro' )

                ->remove('postprecedent' )

                ->remove('postactuel' )
  

                ->remove('moyencommunication' )         

      
                ->remove('conjoint')

                ->remove('disponibilite' )

                ->remove('cotisation')

                ->remove('reunion')
   

                ->remove('enfant')

                


                  ->remove('inviteby')


                 ->remove('formation')

      ->add('save',SubmitType::class,array(
                    'attr'=>array('class'=>'btn btn-success')))
                            ;
  }


  public function getParent()
  {
    return ProfilType::class;

  }

}
