<?php

namespace SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="absence")
 * @ORM\Entity(repositoryClass="SchoolBundle\Repository\AbsenceRepository")
 */
class Absence
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(name="matiere",referencedColumnName="idMatiere")
     */
    private $matiere;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure", type="time")
     */
    private $heure;

    /**
     * @ORM\ManyToOne(targetEntity="Etudiant")
     * @ORM\JoinColumn(name="idEtudiant",referencedColumnName="id")
     */
    private $idEtudiant;

    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="classe",referencedColumnName="idClasse")
     */
    private $classe;

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
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
     * Set matiere
     *
     * @param string $matiere
     *
     * @return Absence
     */
    public function setMatiere($matiere)
    {
        $this->matiere = $matiere;

        return $this;
    }

    /**
     * Get matiere
     *
     * @return string
     */
    public function getMatiere()
    {
        return $this->matiere;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Absence
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param \DateTime $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Absence
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set idEtudiant
     *
     * @param integer $idEtudiant
     *
     * @return Absence
     */
    public function setIdEtudiant($idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    /**
     * Get idEtudiant
     *
     * @return int
     */
    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }
}

