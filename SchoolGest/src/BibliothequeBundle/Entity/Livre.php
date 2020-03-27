<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livre
 *
 * @ORM\Table(name="livre", indexes={@ORM\Index(name="fk_livre_bibliotheque", columns={"id_bibliotheque"})})
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\LivreRepository")
 */
class Livre
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255, nullable=false)
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="editeur", type="string", length=20, nullable=false)
     */
    private $editeur;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=20, nullable=false)
     */
    private $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="date", nullable=false)
     */
    private $datesortie;

    /**
     * @var integer
     *
     * @ORM\Column(name="taille", type="integer", nullable=false)
     */
    private $taille;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     */
    private $quantite = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="date", nullable=false)
     */
    private $dateajout;

    /**
     * @var \Bibliotheque
     *
     * @ORM\ManyToOne(targetEntity="Bibliotheque")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bibliotheque", referencedColumnName="id")
     * })
     */
    private $idBibliotheque;

    /**
     * @return int
     */
    public function getId()
    {
        return $this -> id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this -> id = $id;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this -> titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this -> titre = $titre;
    }

    /**
     * @return string
     */
    public function getAuteur()
    {
        return $this -> auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur($auteur)
    {
        $this -> auteur = $auteur;
    }

    /**
     * @return string
     */
    public function getEditeur()
    {
        return $this -> editeur;
    }

    /**
     * @param string $editeur
     */
    public function setEditeur($editeur)
    {
        $this -> editeur = $editeur;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this -> categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this -> categorie = $categorie;
    }

    /**
     * @return \DateTime
     */
    public function getDatesortie()
    {
        return $this -> datesortie;
    }

    /**
     * @param \DateTime $datesortie
     */
    public function setDatesortie($datesortie)
    {
        $this -> datesortie = $datesortie;
    }

    /**
     * @return int
     */
    public function getTaille()
    {
        return $this -> taille;
    }

    /**
     * @param int $taille
     */
    public function setTaille($taille)
    {
        $this -> taille = $taille;
    }

    /**
     * @return int
     */
    public function getQuantite()
    {
        return $this -> quantite;
    }

    /**
     * @param int $quantite
     */
    public function setQuantite($quantite)
    {
        $this -> quantite = $quantite;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this -> img;
    }

    /**
     * @param string $img
     */
    public function setImg($img)
    {
        $this -> img = $img;
    }

    /**
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this -> dateajout;
    }

    /**
     * @param \DateTime $dateajout
     */
    public function setDateajout($dateajout)
    {
        $this -> dateajout = $dateajout;
    }

    /**
     * @return \Bibliotheque
     */
    public function getIdBibliotheque()
    {
        return $this -> idBibliotheque;
    }

    /**
     * @param \Bibliotheque $idBibliotheque
     */
    public function setIdBibliotheque($idBibliotheque)
    {
        $this -> idBibliotheque = $idBibliotheque;
    }


}

