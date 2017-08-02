<?php


namespace JP\ProfilBundle\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class ProfilInviteType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
    		        ->remove('code')
             

                ->remove('datenaiss')

                ->remove('file'  )

                 ->remove('enfant' )

                ->remove('domicile' )

                ->remove('entrecole')

                ->remove('datintro')

                ->remove('postprecedent'  )

                ->remove('postactuel' )

                ->remove('formation' )

               
                 ->remove('club')

                ->remove('moyencommunication'  )         

  

                ->remove('fonction')

                ->remove('conjoint')

                ->remove('disponibilite' )

                ->remove('cotisation')

                ->remove('reunion') 

          ->add('save',SubmitType::class,array(
                    'attr'=>array('class'=>'btn btn-success')))
        		;
  }


  public function getParent()
  {
    return ProfilType::class;

  }

}

