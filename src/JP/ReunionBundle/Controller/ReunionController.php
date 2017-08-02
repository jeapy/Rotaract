<?php

namespace JP\ReunionBundle\Controller;

use JP\ReunionBundle\Entity\Reunion;
use JP\ProfilBundle\Entity\Profil;
use JP\MainBundle\Entity\Presence;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityRepository;


use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

/**
 * Reunion controller.
 *
 */
class ReunionController extends Controller
{
    /**
     * Lists all reunion entities.
     *
     */
    public function indexAction()
    { 

        $em = $this->getDoctrine()->getManager();



        $reunions = $em->getRepository('JPReunionBundle:Reunion')->findReunion();

        return $this->render('JPReunionBundle:Reunion:index.html.twig', array(
            'reunions' => $reunions,
        ));
    }

    /**
     * Creates a new reunion entity.
     *
     */
    public function newAction(Request $request)
    {
        $user = $this->getUser();

        $reunion = new Reunion();
        $form = $this->createForm('JP\ReunionBundle\Form\ReunionType', $reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $reunion->setCreatedBy($user);

            $em->persist($reunion);
            $em->flush();

            return $this->redirectToRoute('reunion_show', array('id' => $reunion->getId()));
        }

        return $this->render('JPReunionBundle:Reunion:new.html.twig', array(
            'reunion' => $reunion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reunion entity.
     *
     */
    public function showAction(Reunion $reunion)
    {   

    $deleteForm = $this->createDeleteForm($reunion);



        return $this->render('JPReunionBundle:Reunion:show.html.twig', array(
            'reunion' => $reunion,
            'delete_form' => $deleteForm->createView(),
           
        ));
    }

    /**
     * Displays a form to edit an existing reunion entity.
     *
     */
    public function editAction(Request $request, Reunion $reunion)
    {
        $deleteForm = $this->createDeleteForm($reunion);
        $editForm = $this->createForm('JP\ReunionBundle\Form\ReunionType', $reunion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reunion_edit', array('id' => $reunion->getId()));
        }

        return $this->render('JPReunionBundle:Reunion:edit.html.twig', array(
            'reunion' => $reunion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reunion entity.
     *
     */
    public function deleteAction(Request $request, Reunion $reunion)
    {
        $form = $this->createDeleteForm($reunion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reunion);
            $em->flush();
        }

        return $this->redirectToRoute('reunion_index');
    }

    /**
     * Creates a form to delete a reunion entity.
     *
     * @param Reunion $reunion The reunion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reunion $reunion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reunion_delete', array('id' => $reunion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


public function participerAction(Request $request , Reunion $reunion)
    {

    $em = $this->getDoctrine()->getManager();

 
//======================================================================================
    $formBuilderM = $this->get('form.factory')->createBuilder(FormType::class,$reunion);
    $formBuilderM     
       ->add('profil', EntityType::class, array(
                      'class'        => 'JPProfilBundle:Profil',
                      'choice_label' =>  function ($profil) {
                                                return $profil->getNom().' '.$profil->getPrenom();
                                            },
                      'multiple'     => true,  
                     
                      'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('m')
                              ->orderBy('m.profiltype' , 'ASC');
                                    },
                     'group_by' => function($profil) {
                        if ($profil->getProfiltype()== 1) {
                            return 'MEMBRE';
                        } elseif($profil->getProfiltype()==2) {
                            return 'POSTULANT';
                        }elseif($profil->getProfiltype()==3) {
                            return 'VISITEUR';
                        }else {
                            return 'INVITE';
                        }

                    },      
                      'required' => true,
                      'expanded'=> false
                    ))    ;
        $formM = $formBuilderM->getForm();
        $formM->handleRequest($request); 

        if ($formM->isSubmitted() && $formM->isValid() ) {
            $em->flush();
        

       return $this->redirectToRoute('reunion_show', array('id' => $reunion->getId()));
        }


      
        return $this->render('JPReunionBundle:Reunion:participant.html.twig', array(
            'reunion'      => $reunion,
            'formM'         => $formM->createView(),
           
            
        ));
    }


 /**
     * Finds and displays a reunion entity.
     *
     */
     public function presenceIndexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reunions = $em->getRepository('JPReunionBundle:Reunion')->findAll();

        return $this->render('JPReunionBundle:Presence:index.html.twig', array(
            'reunions' => $reunions,
        ));
    }

    public function presenceShowAction(Reunion $reunion)
    {   

    
 // On récupère maintenant la liste des AdvertSkill
    $em = $this->getDoctrine()->getManager();

    $listPresences = $em->getRepository('JPMainBundle:Presence')->findBy(array('reunion' => $reunion));

        return $this->render('JPReunionBundle:Presence:show.html.twig', array(
            'reunion' => $reunion,
            'listPresences' =>  $listPresences
           
        ));
    }
}
