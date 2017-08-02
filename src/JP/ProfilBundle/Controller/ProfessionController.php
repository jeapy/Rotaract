<?php

namespace JP\ProfilBundle\Controller;

use JP\ProfilBundle\Entity\Profession;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Profession controller.
 *
 */
class ProfessionController extends Controller
{
    /**
     * Lists all profession entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $professions = $em->getRepository('JPProfilBundle:Profession')->findAll();

        return $this->render('profession/index.html.twig', array(
            'professions' => $professions,
        ));
    }

    /**
     * Creates a new profession entity.
     *
     */
    public function newAction(Request $request)
    {
        $profession = new Profession();
        $form = $this->createForm('JP\ProfilBundle\Form\ProfessionType', $profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profession);
            $em->flush();

            return $this->redirectToRoute('profil_member_profession_show', array('id' => $profession->getId()));
        }

        return $this->render('profession/new.html.twig', array(
            'profession' => $profession,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a profession entity.
     *
     */
    public function showAction(Profession $profession)
    {
        $deleteForm = $this->createDeleteForm($profession);

        return $this->render('profession/show.html.twig', array(
            'profession' => $profession,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing profession entity.
     *
     */
    public function editAction(Request $request, Profession $profession)
    {
        $deleteForm = $this->createDeleteForm($profession);
        $editForm = $this->createForm('JP\ProfilBundle\Form\ProfessionType', $profession);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profil_member_profession_edit', array('id' => $profession->getId()));
        }

        return $this->render('profession/edit.html.twig', array(
            'profession' => $profession,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a profession entity.
     *
     */
    public function deleteAction(Request $request, Profession $profession)
    {
        $form = $this->createDeleteForm($profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($profession);
            $em->flush();
        }

        return $this->redirectToRoute('profil_member_profession_index');
    }

    /**
     * Creates a form to delete a profession entity.
     *
     * @param Profession $profession The profession entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Profession $profession)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profil_member_profession_delete', array('id' => $profession->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
