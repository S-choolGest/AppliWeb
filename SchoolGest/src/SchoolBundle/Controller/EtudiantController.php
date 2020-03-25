<?php

namespace SchoolBundle\Controller;

use SchoolBundle\Entity\Etudiant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Etudiant controller.
 *
 */
class EtudiantController extends Controller
{
    /**
     * Lists all etudiant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etudiants = $em->getRepository('SchoolBundle:Etudiant')->findAll();

        return $this->render('etudiant/index.html.twig', array(
            'etudiants' => $etudiants,
        ));
    }

    /**
     * Creates a new etudiant entity.
     *
     */
    public function newAction(Request $request)
    {
        $etudiant = new Etudiant();
        $form = $this->createForm('SchoolBundle\Form\EtudiantType', $etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etudiant);
            $em->flush();

            return $this->redirectToRoute('etudiant_show', array('id' => $etudiant->getId()));
        }


        return $this->render('etudiant/new.html.twig', array(
            'etudiant' => $etudiant,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a etudiant entity.
     *
     */
    public function showAction(Etudiant $etudiant)
    {
        $deleteForm = $this->createDeleteForm($etudiant);

        return $this->render('etudiant/show.html.twig', array(
            'etudiant' => $etudiant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etudiant entity.
     *
     */
    public function editAction(Request $request, Etudiant $etudiant)
    {
        $deleteForm = $this->createDeleteForm($etudiant);
        $editForm = $this->createForm('SchoolBundle\Form\EtudiantType', $etudiant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etudiant_edit', array('id' => $etudiant->getId()));
        }

        return $this->render('etudiant/edit.html.twig', array(
            'etudiant' => $etudiant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etudiant entity.
     *
     */
    public function deleteAction(Request $request, Etudiant $etudiant)
    {
        $form = $this->createDeleteForm($etudiant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etudiant);
            $em->flush();
        }

        return $this->redirectToRoute('etudiant_index');
    }

    /**
     * Creates a form to delete a etudiant entity.
     *
     * @param Etudiant $etudiant The etudiant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etudiant $etudiant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etudiant_delete', array('id' => $etudiant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
