<?php

namespace SchoolBundle\Controller;

use SchoolBundle\Entity\Absence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Utilisateur;

/**
 * Absence controller.
 *
 */
class AbsenceController extends Controller
{
    /**
     * Lists all absence entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $absences = $em->getRepository('SchoolBundle:Absence')->findAll();

        return $this->render('absence/index.html.twig', array(
            'absences' => $absences,
        ));
    }

    /**
     * Creates a new absence entity.
     *
     */
    public function newAction(Request $request)
    {
        if ($this->isGranted("ROLE_PROFESSEUR")){
        $absence = new Absence();
        $userId =  $this->getUser()->getId();
        $form = $this->createForm('SchoolBundle\Form\AbsenceType', $absence,array('id'=>$userId));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($absence);
            $em->flush();
            return $this->redirectToRoute('absence_show', array('id' => $absence->getId()));
        }

        return $this->render('absence/new.html.twig', array(
            'absence' => $absence,

            'form' => $form->createView(),
        ));
    }elseif ($this->isGranted("ROLE_MODERATEUR")||$this->isGranted("ROLE_SCOLARITE")){
            $absence = new Absence();
            $form = $this->createForm('SchoolBundle\Form\AbsenceAdminType', $absence);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($absence);
                $em->flush();

                return $this->redirectToRoute('absence_show', array('id' => $absence->getId()));
            }

            return $this->render('absence/new.html.twig', array(
                'absence' => $absence,
                'form' => $form->createView(),
            ));
        }


        else return $this->redirectToRoute('school_back');


    }

    /**
     * Finds and displays a absence entity.
     *
     */
    public function showAction(Absence $absence)
    {
        $deleteForm = $this->createDeleteForm($absence);

        return $this->render('absence/show.html.twig', array(
            'absence' => $absence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing absence entity.
     *
     */
    public function editAction(Request $request, Absence $absence)
    {
        $deleteForm = $this->createDeleteForm($absence);
        $editForm = $this->createForm('SchoolBundle\Form\AbsenceType', $absence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('absence_edit', array('id' => $absence->getId()));
        }

        return $this->render('absence/edit.html.twig', array(
            'absence' => $absence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a absence entity.
     *
     */
    public function deleteAction(Request $request, Absence $absence)
    {
        $form = $this->createDeleteForm($absence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($absence);
            $em->flush();
        }

        return $this->redirectToRoute('absence_index');
    }

    /**
     * Creates a form to delete a absence entity.
     *
     * @param Absence $absence The absence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Absence $absence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('absence_delete', array('id' => $absence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
