<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Bibliotheque;
use BibliothequeBundle\Entity\Emprunt;
use BibliothequeBundle\Entity\Livre;
use BibliothequeBundle\Form\EmpruntType;
use BibliothequeBundle\Form\LivreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CatalogueController extends Controller
{
    public function addAction(Request $request)
    {
        $livre = new Livre();
        $formLivre = $this->createForm(LivreType::class, $livre);
        $formLivre->handleRequest($request);
        if($formLivre->isValid()){
            $em = $this->getDoctrine()->getManager();
            $livre->setDateajout(new \DateTime('now'));
            $biblio = new Bibliotheque();
            $biblio->getId();
            $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $this->getUser()->getId()]);
            $livre->setIdBibliotheque($biblio);
            $em->persist($livre);
            $em->flush();
            return $this->redirectToRoute('catalogue_livre');
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
        if($formLivre->isValid()){
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
        return $this->json(['id' => $id, 'message' => 'Suppression reussie'], 200);
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
        $mostuse = $this->getDoctrine()->getRepository(Livre::class)->LivresLesPlusDemandes($biblio);
        $bibliotheques = $this->getDoctrine()->getRepository(Bibliotheque::class)->findAll();

        return $this->render('@Bibliotheque/Catalogue/catalogue.html.twig', array(
            "livres"=>$livres,
            "tags" => $tags,
            "mostuse" => $mostuse,
            "biblio" => $bibliotheques,
            // ...
        ));
    }

    public function catalogue_livre_front_categorieAction($categorie)
    {
        $biblio = null;
        $LivreRepos = $this->getDoctrine()->getRepository(Livre::class);
        $livres = $LivreRepos->findBy(['categorie' => $categorie]);
        $tags = $LivreRepos->getAllCategorie();
        $mostuse = $this->getDoctrine()->getRepository(Livre::class)->LivresLesPlusDemandes($biblio);
        $bibliotheques = $this->getDoctrine()->getRepository(Bibliotheque::class)->findAll();

        return $this->render('@Bibliotheque/Catalogue/catalogue.html.twig', array(
            "livres"=>$livres,
            "tags" => $tags,
            "mostuse" => $mostuse,
            "biblio" => $bibliotheques,
            // ...
        ));
    }

    public function rechercher_livreAction(Request $request)
    {
        $biblio = null;
        $LivreRepos = $this->getDoctrine()->getRepository(Livre::class);
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['nom'=>$request->request->get('biblio')]);
        $livres = $LivreRepos->rechercher_livre($request->request->get('mot_recherche'), $request->request->get('categorie'), $biblio->getId());

        return new JsonResponse(array('livres'=>$livres), 200);
    }


// partie mobile
    public function list_livres_by_bibliothecaireAction($iduser)
    {
        $biblio = new Bibliotheque();
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $iduser]);
        //$livres = $this->getDoctrine()->getRepository(Livre::class)->findBy(['idBibliotheque' => $biblio->getId()]);
        $livres = $this->getDoctrine()->getRepository(Livre::class)->getAllLivresByBibliotheque($biblio->getId());
        //dump($livres);
        return new JsonResponse(array('livres'=>$livres), 200);
    }

    public function MaddAction($titre, $auteur, $editeur, $categorie, $taille, $quantite, $path, $extension, $datesortie, $iduser)
    {
        $livre = new Livre();
        $livre->setId(0);
        $livre->setAuteur($auteur);
        $livre->setCategorie($categorie);
        $livre->setDatesortie(new \DateTime($datesortie));
        $livre->setEditeur($editeur);
        $livre->setTitre($titre);
        $livre->setTaille($taille);
        $livre->setQuantite($quantite);
        if($path!=""){
            $path=str_replace("&","/",$path);
            $image_link = $path;//Direct link to image
            $structure = '';
            $ex=$pieces = explode(".", $image_link);

            $destination= $this->get('kernel')->getProjectDir()."/web/upload/uploads/";
            $name = new \DateTime('now');
            $name1 = $name->format('Y-m-dH:i:s').$extension;
            $name1=str_replace(":","-",$name1);
            $destination .= $name1;
            $livre->setImg($name1);
            if(copy($path, $destination)){
                $em = $this->getDoctrine()->getManager();
                $livre->setDateajout(new \DateTime('now'));
                $biblio = new Bibliotheque();
                $biblio->getId();
                $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $iduser]);
                $livre->setIdBibliotheque($biblio);
                $em->persist($livre);
                $em->flush();
            }
        }

        return $this->json(['id' => $livre->getId(), 'message' => 'ajout reussi'], 200);
    }

    public function uploadAction($path, $extension)
    {
        if($path!=""){
            $path=str_replace("&","/",$path);
            $image_link = $path;//Direct link to image
            $structure = '';
            $ex=$pieces = explode(".", $image_link);

            $destination= $this->get('kernel')->getProjectDir()."/web/upload/uploads/";
            $name = new \DateTime('now');
            $name1 = $name->format('Y-m-dH:i:s').$extension;
            $name1=str_replace(":","-",$name1);
            $destination .= $name1;
            if(copy($path, $destination)){
                echo "dsdsqd";
            }
        }
        return $this->json(['id' => 'dfg', 'message' => 'ajout reussi'], 200);
    }

    public function MeditAction($id, $titre, $auteur, $editeur, $categorie, $taille, $quantite)
    {
        $livre = $this->getDoctrine()->getRepository(Livre::class)->find($id);
        $livre->setTitre($titre);
        $livre->setAuteur($auteur);
        $livre->setEditeur($editeur);
        $livre->setCategorie($categorie);
        $livre->setTaille($taille);
        $livre->setQuantite($quantite);
        dump($livre);
        $em = $this->getDoctrine()->getManager();
        $em->flush();
        return $this->json(['message'=>'modification réussie'], 200);
    }

    public function list_bibliosAction()
    {
        $biblios = $this->getDoctrine()->getRepository(Bibliotheque::class)->getAllBiblios();
        return new JsonResponse(array('biblios'=>$biblios), 200);
    }

    public function list_livres_by_biblioAction($idbibliotheque)
    {
        $livres = $this->getDoctrine()->getRepository(Livre::class)->getAllLivresByBibliotheque($idbibliotheque);
        return new JsonResponse(array('livres'=>$livres), 200);
    }

    public function list_livresAction()
    {
        $biblio = new Bibliotheque();
        $livres = $this->getDoctrine()->getRepository(Livre::class)->getAllLivres();
        //dump($livres);
        return new JsonResponse(array('livres'=>$livres), 200);
    }

    public function Mrechercher_livreFrontAction($text, $biblio)
    {
        $LivreRepos = $this->getDoctrine()->getRepository(Livre::class);
        $livres = $LivreRepos->Mrechercher_livre($text, $biblio);

        return new JsonResponse(array('livres'=>$livres), 200);
    }

    public function Mrechercher_livreBackAction($text, $idbibliothecaire)
    {
        $biblio = $this->getDoctrine()->getRepository(Bibliotheque::class)->findOneBy(['idBibliothecaire' => $idbibliothecaire]);
        $LivreRepos = $this->getDoctrine()->getRepository(Livre::class);
        $livres = $LivreRepos->Mrechercher_livre($text, $biblio->getId());

        return new JsonResponse(array('livres'=>$livres), 200);
    }
}
