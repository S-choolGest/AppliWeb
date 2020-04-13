<?php

namespace BibliothequeBundle\Controller;

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

    public function deleteAction()
    {
        return $this->render('BibliothequeBundle:Emprunt:delete.html.twig', array(
            // ...
        ));
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
        $emprunts = $this->getDoctrine()->getRepository(Emprunt::class)->findAll();
        return $this->render('@Bibliotheque/Emprunt/emprunts.html.twig', array(
            "emprunts" => $emprunts,
            // ...
        ));
    }

}
