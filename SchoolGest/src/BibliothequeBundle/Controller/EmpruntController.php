<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Bibliotheque;
use BibliothequeBundle\Entity\Emprunt;
use BibliothequeBundle\Entity\Livre;
use BibliothequeBundle\Form\EmpruntType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use UserBundle\Entity\Utilisateur;

class EmpruntController extends Controller
{
    public function addAction(Request $request)
    {
        $emprunt = new Emprunt();
        $em = $this->getDoctrine()->getManager();
        $livre = $this->getDoctrine()->getRepository(Livre::class)->find($request->request->get('idlivre'));
        $emprunt->setIdlivre($livre);
        $user = $this->getDoctrine()->getRepository(Utilisateur::class)->find($request->request->get('iduser'));
        $emprunt->setIdemprunteur($user);
        $emprunt->setDatedebut(new \DateTime($request->request->get('datedebut')));
        $emprunt->setDatefin(new \DateTime($request->request->get('datefin')));
        $emprunt->setDateemprunt(new \DateTime());
        $em->persist($emprunt);
        $em->flush();
        return $this->json(['message' => ' 1 23 test'], 200);
    }

    public function deleteAction($id)
    {
        $emprunt = $this->getDoctrine()->getRepository(Emprunt::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($emprunt);
        $em->flush();
        return $this->json(['message' => 'emprunt supprimé'], 200);
        /*return $this->render('BibliothequeBundle:Emprunt:delete.html.twig', array(
            // ...
        ));*/
    }

    public function editAction($id, $choix)
    {
        $emprunt = $this->getDoctrine()->getRepository(Emprunt::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $emprunt->setEtat($choix);
        if($choix == 3)
            $emprunt->setDateRendu(new \DateTime());
        else
            $emprunt->setDateConfirmation(new \DateTime());
        $em->flush();

        return $this->json(['id' => $id, 'message' => 'modification reussite'], 200);
    }

    public function viewAction()
    {
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $emprunts = $etats = null;
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        if($biblio != null)
        {
            $emprunts = $empruntRepos->findAllByBibliotheque($biblio->getId());
            $recents = $empruntRepos->findAllRecentByBibliotheque($biblio->getId());
            $etats = [$empruntRepos->countByEtat($biblio->getId(), 0), $empruntRepos->countByEtat($biblio->getId(), 1), $empruntRepos->countByEtat($biblio->getId(), 2), $empruntRepos->countByEtat($biblio->getId(), 3)];
            //$etats = $empruntRepos->countByEtat($biblio->getId(), 0);
        }

        return $this->render('@Bibliotheque/Emprunt/emprunts.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewByCategorieAction($categorie)
    {
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $emprunts = $etats = null;
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        if($biblio != null)
        {
            $emprunts = $empruntRepos->findAllByBibliothequeCategorie($biblio->getId(), $categorie);
            $recents = $empruntRepos->findAllRecentByBibliotheque($biblio->getId());
            $etats = [$empruntRepos->countByEtat($biblio->getId(), 0), $empruntRepos->countByEtat($biblio->getId(), 1), $empruntRepos->countByEtat($biblio->getId(), 2), $empruntRepos->countByEtat($biblio->getId(), 3)];
        }

        return $this->render('@Bibliotheque/Emprunt/emprunts.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewByLivreAction($categorie)
    {
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $emprunts = $etats = null;
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        if($biblio != null)
        {
            $emprunts = $empruntRepos->findAllByLivre($biblio->getId(), $categorie);
            $recents = $empruntRepos->findAllRecentByBibliotheque($biblio->getId());
            $etats = [$empruntRepos->countByEtat($biblio->getId(), 0), $empruntRepos->countByEtat($biblio->getId(), 1), $empruntRepos->countByEtat($biblio->getId(), 2), $empruntRepos->countByEtat($biblio->getId(), 3)];
        }

        return $this->render('@Bibliotheque/Emprunt/emprunts.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewEmpruntAction($id)
    {
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $emprunts = $etats = null;
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        if($biblio != null)
        {
            $emprunts = $empruntRepos->findOneByBibliotheque($biblio->getId(), $id);
            $recents = $empruntRepos->findAllRecentByBibliotheque($biblio->getId());
            $etats = [$empruntRepos->countByEtat($biblio->getId(), 0), $empruntRepos->countByEtat($biblio->getId(), 1), $empruntRepos->countByEtat($biblio->getId(), 2), $empruntRepos->countByEtat($biblio->getId(), 3)];
        }

        return $this->render('@Bibliotheque/Emprunt/emprunts.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewFrontAction()
    {
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        $emprunts = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId()]);
        $recents = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId()], ['dateemprunt' => 'desc'], 3);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $etats = [$empruntRepos->countFrontByEtat( $this->getUser()->getId(), 0), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 1), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 2), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 3)];
        return $this->render('@Bibliotheque/Emprunt/emprunts_front.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewFrontByCategorieAction($categorie)
    {
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        $emprunts = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId(), 'etat' => $categorie]);
        $recents = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId()], ['dateemprunt' => 'desc'], 3);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $etats = [$empruntRepos->countFrontByEtat($this->getUser()->getId(), 0), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 1), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 2), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 3)];
        return $this->render('@Bibliotheque/Emprunt/emprunts_front.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewFrontByLivreAction($categorie)
    {
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        $emprunts = $empruntRepos->findAllByLivre_front($this->getUser()->getId(), $categorie);
        $recents = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId()], ['dateemprunt' => 'desc'], 3);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $etats = [$empruntRepos->countFrontByEtat($this->getUser()->getId(), 0), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 1), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 2), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 3)];
        return $this->render('@Bibliotheque/Emprunt/emprunts_front.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }

    public function viewFrontEmpruntAction($id)
    {
        $empruntRepos = $this->getDoctrine()->getRepository(Emprunt::class);
        $emprunts = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId(), 'id' => $id]);
        $recents = $empruntRepos->findBy(['idemprunteur' => $this->getUser()->getId()], ['dateemprunt' => 'desc'], 3);
        $tags = $this->getDoctrine()->getRepository(Livre::class)->getAllCategorie();
        $etats = [$empruntRepos->countFrontByEtat($this->getUser()->getId(), 0), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 1), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 2), $empruntRepos->countFrontByEtat($this->getUser()->getId(), 3)];
        return $this->render('@Bibliotheque/Emprunt/emprunts_front.html.twig', array(
            "emprunts" => $emprunts,
            "recents" => $recents,
            "tags" => $tags,
            "etats" => $etats
            // ...
        ));
    }
}
