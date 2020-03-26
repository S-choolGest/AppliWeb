<?php

namespace BibliothequeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CatalogueController extends Controller
{
    public function addAction()
    {
        return $this->render('@Bibliotheque/Catalogue/add.html.twig', array(
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
