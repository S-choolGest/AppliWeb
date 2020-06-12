<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Livre
 *
 * @ORM\Table(name="livre", indexes={@ORM\Index(name="fk_livre_bibliotheque", columns={"id_bibliotheque"})})
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\LivreRepository")
 * @Vich\Uploadable
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
     * @Assert\Length(min=3)
     * @Assert\NotBlank()
     * @Assert\Regex (
     *     pattern="/^\w+/",
     *     message="le champ titre doit au-moins commencer par des lettres")
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le champ auteur ne doit contenir que des lettres"
     * )
     */
    private $auteur;

    /**
     * @var string
     *
     * @ORM\Column(name="editeur", type="string", length=20, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     * @Assert\Regex(
     *     pattern="/\d/",
     *     match=false,
     *     message="le champ editeur ne doit contenir que des lettres"
     * )
     */
    private $editeur;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=20, nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private $categorie;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSortie", type="date", nullable=false)
     * @Assert\NotBlank()
     * @Assert\LessThan("today")
     */
    private $datesortie;

    /**
     * @var integer
     *
     * @ORM\Column(name="taille", type="integer", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max="5")
     * @Assert\GreaterThan(0)
     * @Assert\Type(
     *     type="integer",
     *     message="La valeur {{ value }} n'est pas valide {{ type }}."
     * )
     */
    private $taille;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=false)
     * @Assert\NotBlank()
     * @Assert\Length(max="4")
     * @Assert\GreaterThan(0)
     * @Assert\Type(
     *     type="integer",
     *     message="La valeur {{ value }} n'est pas valide {{ type }}."
     * )
     */
    private $quantite = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @Vich\UploadableField(mapping="img_livre", fileNameProperty="img")
     * @var File
     * @Assert\NotBlank()
     */
    private $imageFile;

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
     * @return File
     */
    public function getImageFile()
    {
        return $this -> imageFile;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->dateajout = new \DateTime('now');
        }
        return $this;
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

