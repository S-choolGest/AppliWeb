<?php

namespace BibliothequeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt", indexes={@ORM\Index(name="fk_livre", columns={"idLivre"}), @ORM\Index(name="fk_emprunt_user", columns={"idEmprunteur"})})
 * @ORM\Entity(repositoryClass="BibliothequeBundle\Repository\EmpruntRepository")
 */
class Emprunt
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
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmprunt", type="date", nullable=false)
     */
    private $dateemprunt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateConfirmation", type="date", nullable=true)
     */
    private $dateconfirmation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRendu", type="date", nullable=true)
     */
    private $daterendu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmprunteur", referencedColumnName="id")
     * })
     */
    private $idemprunteur;

    /**
     * @var \Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLivre", referencedColumnName="id")
     * })
     */
    private $idlivre;

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
     * @return int
     */
    public function getEtat()
    {
        return $this -> etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat($etat)
    {
        $this -> etat = $etat;
    }

    /**
     * @return \DateTime
     */
    public function getDateemprunt()
    {
        return $this -> dateemprunt;
    }

    /**
     * @param \DateTime $dateemprunt
     */
    public function setDateemprunt($dateemprunt)
    {
        $this -> dateemprunt = $dateemprunt;
    }

    /**
     * @return \DateTime
     */
    public function getDateconfirmation()
    {
        return $this -> dateconfirmation;
    }

    /**
     * @param \DateTime $dateconfirmation
     */
    public function setDateconfirmation($dateconfirmation)
    {
        $this -> dateconfirmation = $dateconfirmation;
    }

    /**
     * @return \DateTime
     */
    public function getDaterendu()
    {
        return $this -> daterendu;
    }

    /**
     * @param \DateTime $daterendu
     */
    public function setDaterendu($daterendu)
    {
        $this -> daterendu = $daterendu;
    }

    /**
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this -> datedebut;
    }

    /**
     * @param \DateTime $datedebut
     */
    public function setDatedebut($datedebut)
    {
        $this -> datedebut = $datedebut;
    }

    /**
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this -> datefin;
    }

    /**
     * @param \DateTime $datefin
     */
    public function setDatefin($datefin)
    {
        $this -> datefin = $datefin;
    }

    /**
     * @return \FosUser
     */
    public function getIdemprunteur()
    {
        return $this -> idemprunteur;
    }

    /**
     * @param \FosUser $idemprunteur
     */
    public function setIdemprunteur($idemprunteur)
    {
        $this -> idemprunteur = $idemprunteur;
    }

    /**
     * @return \Livre
     */
    public function getIdlivre()
    {
        return $this -> idlivre;
    }

    /**
     * @param \Livre $idlivre
     */
    public function setIdlivre($idlivre)
    {
        $this -> idlivre = $idlivre;
    }


}

