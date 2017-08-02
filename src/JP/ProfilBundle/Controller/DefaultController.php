<?php

namespace JP\ProfilBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

use JP\ProfilBundle\Entity\Profil;




class DefaultController extends Controller
{
    public function indexAction()
    {
      

      $em = $this->getDoctrine()->getManager();     

        $profils = $em->getRepository('JPProfilBundle:Profil')->FindMemberProfil('1','2');

        return $this->render('JPProfilBundle:Member:membre.html.twig', array(
            'profils' => $profils         
           
        ));
    }

    public function visiteurAction()
    {
      
       $em = $this->getDoctrine()->getManager();     

        $profils = $em->getRepository('JPProfilBundle:Profil')->FindMemberProfil('3','3');

        return $this->render('JPProfilBundle:Visiteur:visiteur.html.twig', array(
            'profils' => $profils          
           
        ));
    }

    public function inviteAction()
    {

      $em = $this->getDoctrine()->getManager();     

        $profils = $em->getRepository('JPProfilBundle:Profil')->FindMemberProfil('4','4');

        return $this->render('JPProfilBundle:Invite:invite.html.twig', array(

           'profils' => $profils            
           
        ));
    }



    public function addMemberAction(Request $request)
  	{
      
        $member         = new Profil();

        $form = $this->createForm('JP\ProfilBundle\Form\ProfilMemberType', $member);
        $form->handleRequest($request);   

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

        
            $member->setCode('AED33');
         //   $member->setImage()->upload();

            $em->persist($member);


            $em->flush();

           
            return $this->redirectToRoute('jp_profil_member_show', array('id' => $member->getId()));

        }

        return $this->render('JPProfilBundle:Member:addMember.html.twig', array(
           'member' => $member,
           'form' => $form->createView()
          
        ));

  }



  public function showMemberAction(Profil $profil)
  {  
      $deleteForm = $this->createMemberDeleteForm($profil);
   
    return $this->render('JPProfilBundle:Member:showMember.html.twig',array(
        'profil' => $profil,
         'delete_form' => $deleteForm->createView()
       
    ));
  }
   public function editMemberAction(Request $request, Profil $profil)
  	{  
        $editForm = $this->createForm('JP\ProfilBundle\Form\ProfilMemberType', $profil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jp_profil_membre_edit', array('id' => $profil->getId()));
        }

        return $this->render('JPProfilBundle:Member:editMember.html.twig', array(
            'profil' => $profil,
            'edit_form' => $editForm->createView()
   //       'delete_form' => $deleteForm->createView(),
            
        ));
      
    
  }


    /**
     * Deletes a profil entity.
     *
     */
    public function deleteMemberAction(Request $request, Profil $profil)
    {
        $form = $this->createMemberDeleteForm($profil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($profil);
            $em->flush();
        }

        return $this->redirectToRoute('jp_profil_homepage');
    }

    /**
     * Creates a form to delete a profil entity.
     *
     * @param Profil $profil The profil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createMemberDeleteForm(Profil $profil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jp_profil_member_delete', array('id' => $profil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



//================================== INVITE MANAGEMENT ========================================

  public function addInviteAction(Request $request)
    {    

        $member = new Profil();
        $form = $this->createForm('JP\ProfilBundle\Form\ProfilInviteType', $member);
        $form->handleRequest($request);           

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           $member->setProfiltype(4);
            $member->setCode('INV-AED43');
         
            $em->persist($member);
            $em->flush();

           
            return $this->redirectToRoute('jp_profil_member_show', array('id' => $member->getId()));

        }

        return $this->render('JPProfilBundle:Invite:addInvite.html.twig', array(
           'member' => $member,
           'form' => $form->createView()
          
        ));

  }


  public function editInviteAction(Request $request, Profil $profil)
    {
   
        $editForm = $this->createForm('JP\ProfilBundle\Form\ProfilInviteType', $profil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jp_profil_invite_edit', array('id' => $profil->getId()));
        }

        return $this->render('JPProfilBundle:Invite:editInvite.html.twig', array(
            'profil' => $profil,
            'edit_form' => $editForm->createView()
   
            
        ));
    }

public function showInviteAction(Profil $profil)
  {  

   
    return $this->render('JPProfilBundle:Invite:showInvite.html.twig',array(
        'profil' => $profil
       
    ));
  }


//=============================== VISITEUR MANAGEMENT =============================================
  public function addVisiteurAction(Request $request)
    {

      
        $member = new Profil();
        $form = $this->createForm('JP\ProfilBundle\Form\ProfilVisiteurType', $member);
        $form->handleRequest($request);   

        

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           $member->setProfiltype(3);
               $member->setCode('VIS-AED33');
          
            $em->persist($member);
            $em->flush();

           
            return $this->redirectToRoute('jp_profil_member_show', array('id' => $member->getId()));

        }

        return $this->render('JPProfilBundle:Visiteur:addVisiteur.html.twig', array(
           'member' => $member,
           'form' => $form->createView()
           
        ));

  }

public function editVisiteurAction(Request $request, Profil $profil)
    {
   
        $editForm = $this->createForm('JP\ProfilBundle\Form\ProfilVisiteurType', $profil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('jp_profil_visiteur_edit', array('id' => $profil->getId()));
        }

        return $this->render('JPProfilBundle:Visiteur:editVisiteur.html.twig', array(
            'profil' => $profil,
            'edit_form' => $editForm->createView()
   
            
        ));
    }

public function showVisiteurAction(Profil $profil)
  {  

   
    return $this->render('JPProfilBundle:Visiteur:showVisiteur.html.twig',array(
        'profil' => $profil
       
    ));
  }
  
}
