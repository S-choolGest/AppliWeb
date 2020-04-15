<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Bibliotheque;
use BibliothequeBundle\Entity\Emprunt;
use BibliothequeBundle\Entity\Livre;
use BibliothequeBundle\Form\EmpruntType;
use BibliothequeBundle\Form\LivreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogueController extends Controller
{
    public function addAction(Request $request)
    {
        $livre = new Livre();
        $formLivre = $this->createForm(LivreType::class, $livre);
        $formLivre->handleRequest($request);
        if($formLivre->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $livre->setDateajout(new \DateTime('now'));
            $biblio = new Bibliotheque();
            $biblio->getId();
            $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
            $livre->setIdBibliotheque($biblio);
            $em->persist($livre);
            $em->flush();
            //return $this->redirectToRoute('catalogue_livre');
            //return $this->json(['id' => $livre->getId(), 'message' => 'ajout reussi'], 200);
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
            "f"=>$formLivre->createView(),
            "img"=>$livre->getImg()
            // ...
        ));
    }

    public function deleteAction($id)
    {
        $livre = $this->getDoctrine()->getRepository( Livre::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($livre);
        $em->flush();
        return $this->json(['id' => $id, 'message' => 'Suppression reussite'], 200);
    }

    public function searchAction()
    {
        $biblio = new Bibliotheque();
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
        $livres = $this->getDoctrine()->getRepository(Livre::class)->findBy(['idBibliotheque' => $biblio->getId()]);
        return $this->render('@Bibliotheque/Catalogue/search.html.twig', array(
            "livres"=>$livres
            // ...
        ));
    }

    public function catalogueAction(){
        $biblio = null;
        $LivreRepos = $this->getDoctrine()->getRepository(Livre::class);
        $livres = $LivreRepos->findAll();
        $tags = $LivreRepos->getAllCategorie();
        $mostuse = $LivreRepos->LivresLesPlusDemandes($biblio);

        return $this->render('@Bibliotheque/Catalogue/catalogue.html.twig', array(
            "livres"=>$livres,
            "tags" => $tags,
            "mostuse" => $mostuse,
            // ...
        ));
    }
}
