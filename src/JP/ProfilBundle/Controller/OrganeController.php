<?php

namespace JP\ProfilBundle\Controller;

use JP\ProfilBundle\Entity\Organe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Organe controller.
 *
 */
class OrganeController extends Controller
{
    /**
     * Lists all organe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $organes = $em->getRepository('JPProfilBundle:Organe')->findAll();

        return $this->render('organe/index.html.twig', array(
            'organes' => $organes,
        ));
    }

    /**
     * Creates a new organe entity.
     *
     */
    public function newAction(Request $request)
    {
        $organe = new Organe();
        $form = $this->createForm('JP\ProfilBundle\Form\OrganeType', $organe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organe);
            $em->flush();

            return $this->redirectToRoute('profil_member_organe_show', array('id' => $organe->getId()));
        }

        return $this->render('organe/new.html.twig', array(
            'organe' => $organe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a organe entity.
     *
     */
    public function showAction(Organe $organe)
    {
        $deleteForm = $this->createDeleteForm($organe);

        return $this->render('organe/show.html.twig', array(
            'organe' => $organe,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing organe entity.
     *
     */
    public function editAction(Request $request, Organe $organe)
    {
        $deleteForm = $this->createDeleteForm($organe);
        $editForm = $this->createForm('JP\ProfilBundle\Form\OrganeType', $organe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profil_member_organe_edit', array('id' => $organe->getId()));
        }

        return $this->render('organe/edit.html.twig', array(
            'organe' => $organe,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a organe entity.
     *
     */
    public function deleteAction(Request $request, Organe $organe)
    {
        $form = $this->createDeleteForm($organe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organe);
            $em->flush();
        }

        return $this->redirectToRoute('profil_member_organe_index');
    }

    /**
     * Creates a form to delete a organe entity.
     *
     * @param Organe $organe The organe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Organe $organe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profil_member_organe_delete', array('id' => $organe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
