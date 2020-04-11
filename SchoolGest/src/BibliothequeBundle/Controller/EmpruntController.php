<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Emprunt;
use BibliothequeBundle\Entity\Livre;
use BibliothequeBundle\Form\EmpruntType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EmpruntController extends Controller
{
    public function addAction($idlivre, $iduser, Request $request)
    {
        $emprunt = new Emprunt();
        $formEmprunt = $this->createForm(EmpruntType::class, $emprunt);
        $formEmprunt->handleRequest($request);
        if($formEmprunt->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($emprunt);
            $em->flush();
            return $this->redirectToRoute('catalogue_livre');
        }
        return $this->render('@Bibliotheque/Catalogue/delete.html.twig', array(
            "f"=>$formEmprunt->createView()
            // ...
        ));
        //return $this->json(['message' => ' 1 23 test'], 200);
    }

    public function deleteAction()
    {
        return $this->render('BibliothequeBundle:Emprunt:delete.html.twig', array(
            // ...
        ));
    }

    public function modifyAction()
    {
        return $this->render('BibliothequeBundle:Emprunt:modify.html.twig', array(
            // ...
        ));
    }

    public function viewAction()
    {
        return $this->render('@Bibliotheque/Emprunt/emprunts.html.twig', array(
            // ...
        ));
    }

}
