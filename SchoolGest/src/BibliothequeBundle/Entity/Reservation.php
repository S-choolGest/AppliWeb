<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
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
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     */
    private $idUtilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_bibliotheque", type="integer", nullable=false)
     */
    private $idBibliotheque;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_debut", type="datetime", nullable=false)
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_final", type="datetime", nullable=false)
     */
    private $heureFinal;

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
    public function getIdUtilisateur()
    {
        return $this -> idUtilisateur;
    }

    /**
     * @param int $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this -> idUtilisateur = $idUtilisateur;
    }

    /**
     * @return int
     */
    public function getIdBibliotheque()
    {
        return $this -> idBibliotheque;
    }

    /**
     * @param int $idBibliotheque
     */
    public function setIdBibliotheque($idBibliotheque)
    {
        $this -> idBibliotheque = $idBibliotheque;
    }

    /**
     * @return \DateTime
     */
    public function getHeureDebut()
    {
        return $this -> heureDebut;
    }

    /**
     * @param \DateTime $heureDebut
     */
    public function setHeureDebut($heureDebut)
    {
        $this -> heureDebut = $heureDebut;
    }

    /**
     * @return \DateTime
     */
    public function getHeureFinal()
    {
        return $this -> heureFinal;
    }

    /**
     * @param \DateTime $heureFinal
     */
    public function setHeureFinal($heureFinal)
    {
        $this -> heureFinal = $heureFinal;
    }


}

