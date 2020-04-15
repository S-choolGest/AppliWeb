<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\Utilisateur;

/**
 * Bibliotheque
 *
 * @ORM\Table(name="bibliotheque", uniqueConstraints={@ORM\UniqueConstraint(name="adresse", columns={"adresse"}), @ORM\UniqueConstraint(name="unique_id_bibliothecaire", columns={"id_bibliothecaire"})})
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\BibliothequeRepository")
 */
class Bibliotheque
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
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bibliothecaire", referencedColumnName="id")
     * })
     */
    private $idBibliothecaire;

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
    public function getNom()
    {
        return $this -> nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this -> nom = $nom;
    }

    /**
     * @return int
     */
    public function getCapacite()
    {
        return $this -> capacite;
    }

    /**
     * @param int $capacite
     */
    public function setCapacite($capacite)
    {
        $this -> capacite = $capacite;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this -> adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this -> adresse = $adresse;
    }

    /**
     * @return Utilisateur
     */
    public function getIdBibliothecaire()
    {
        return $this -> idBibliothecaire;
    }

    /**
     * @param Utilisateur $idBibliothecaire
     */
    public function setIdBibliothecaire($idBibliothecaire)
    {
        $this -> idBibliothecaire = $idBibliothecaire;
    }


}

