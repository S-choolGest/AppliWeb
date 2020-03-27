<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Livre;
use BibliothequeBundle\Form\LivreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatalogueController extends Controller
{
    public function addAction(Request $request)
    {
        $livre = new Livre();
        $formLivre = $this->createForm(LivreType::class, $livre);
        $formLivre->handleRequest($request);
        if($formLivre->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();
            return $this->redirectToRoute('search');
        }
        return $this->render('@Bibliotheque/Catalogue/add.html.twig', array(
            "f"=>$formLivre->createView()
            // ...
        ));
    }

    public function editAction()
    {
        return $this->render('@Bibliotheque/Catalogue/edit.html.twig', array(
            // ...
        ));
    }

    public function deleteAction()
    {
        return $this->render('@Bibliotheque/Catalogue/delete.html.twig', array(
            // ...
        ));
    }

    public function searchAction()
    {
        return $this->render('@Bibliotheque/Catalogue/search.html.twig', array(
            // ...
        ));
    }

}
