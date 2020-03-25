<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="cin", type="integer", length=8)
     */
    private $cin;

    /**
     * @var integer
     *
     * @ORM\Column(name="numTel", type="integer", length=8)
     */
    private $numTel;
    /**
     * @var date
     *
     * @ORM\Column(name="datenaissance", type="date")
     */

    private $datenaissance;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */

    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */

    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */

    private $adresse;
    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="string", length=255)
     */

    private $profile;

    /**
     * Utilisateur constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * @param int $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return int
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * @param int $numTel
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;
    }

    /**
     * @return date
     */
    public function getDatenaissance()
    {
        return $this->datenaissance;
    }

    /**
     * @param date $datenaissance
     */
    public function setDatenaissance($datenaissance)
    {
        $this->datenaissance = $datenaissance;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }





    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }



}

