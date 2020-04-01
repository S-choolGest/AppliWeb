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
            return $this->redirectToRoute('catalogue_livre');
        }
        return $this->render('@Bibliotheque/Catalogue/add.html.twig', array(
            "f"=>$formLivre->createView()
            // ...
        ));
    }

    public function editAction($id, Request $request)
    {
        $livre = $this->getDoctrine()->getRepository(Livre::class)->find($id);
        $formLivre = $this->createForm(LivreType::class, $livre);
        $formLivre->handleRequest($request);
        if($formLivre->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('catalogue_livre');
        }
        return $this->render('@Bibliotheque/Catalogue/edit.html.twig', array(
            "f"=>$formLivre->createView()
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
        $livres = $this->getDoctrine()->getRepository(Livre::class)->findAll();
        return $this->render('@Bibliotheque/Catalogue/search.html.twig', array(
            "livres"=>$livres
            // ...
        ));
    }

    public function catalogueAction(){
        $livres = $this->getDoctrine()->getRepository(Livre::class)->findAll();
        return $this->render('@Bibliotheque/Catalogue/catalogue.html.twig', array(
            "livres"=>$livres
            // ...
        ));
    }
}
