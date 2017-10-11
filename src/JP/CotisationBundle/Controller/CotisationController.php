<?php

namespace JP\CotisationBundle\Controller;

use JP\CotisationBundle\Entity\Cotisation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cotisation controller.
 *
 */
class CotisationController extends Controller
{
    /**
     * Lists all cotisation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cotisations = $em->getRepository('JPCotisationBundle:Cotisation')->findAll();

        return $this->render('JPCotisationBundle:cotisation:index.html.twig', array(
            'cotisations' => $cotisations,
        ));
    }

    /**
     * Creates a new cotisation entity.
     *
     */
    public function newAction(Request $request)
    {
        $cotisation = new Cotisation();
        $form = $this->createForm('JP\CotisationBundle\Form\CotisationType', $cotisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cotisation);
            $em->flush();

            return $this->redirectToRoute('cotisation_show', array('id' => $cotisation->getId()));
        }

        return $this->render('JPCotisationBundle:cotisation:new.html.twig', array(
            'cotisation' => $cotisation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cotisation entity.
     *
     */
    public function showAction(Cotisation $cotisation)
    {
        $deleteForm = $this->createDeleteForm($cotisation);

        return $this->render('JPCotisationBundle:cotisation:show.html.twig', array(
            'cotisation' => $cotisation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cotisation entity.
     *
     */
    public function editAction(Request $request, Cotisation $cotisation)
    {
        $deleteForm = $this->createDeleteForm($cotisation);
        $editForm = $this->createForm('JP\CotisationBundle\Form\CotisationType', $cotisation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cotisation_edit', array('id' => $cotisation->getId()));
        }

        return $this->render('JPCotisationBundle:cotisation:edit.html.twig', array(
            'cotisation' => $cotisation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cotisation entity.
     *
     */
    public function deleteAction(Request $request, Cotisation $cotisation)
    {
        $form = $this->createDeleteForm($cotisation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cotisation);
            $em->flush();
        }

        return $this->redirectToRoute('cotisation_index');
    }

    /**
     * Creates a form to delete a cotisation entity.
     *
     * @param Cotisation $cotisation The cotisation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cotisation $cotisation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cotisation_delete', array('id' => $cotisation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
