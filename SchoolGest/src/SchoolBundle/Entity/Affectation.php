<?php

namespace SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation")
 * @ORM\Entity(repositoryClass="SchoolBundle\Repository\AffectationRepository")
 */
class Affectation
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="idProf",referencedColumnName="id")
     */
    private $idProf;

    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="idClasse",referencedColumnName="idClasse")
     */
    private $idClasse;


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
     * Set idProf
     *
     * @param integer $idProf
     *
     * @return Affectation
     */
    public function setIdProf($idProf)
    {
        $this->idProf = $idProf;

        return $this;
    }

    /**
     * Get idProf
     *
     * @return int
     */
    public function getIdProf()
    {
        return $this->idProf;
    }

    /**
     * Set idClasse
     *
     * @param integer $idClasse
     *
     * @return Affectation
     */
    public function setIdClasse($idClasse)
    {
        $this->idClasse = $idClasse;

        return $this;
    }

    /**
     * Get idClasse
     *
     * @return int
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }
}

