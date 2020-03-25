<?php

namespace SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="SchoolBundle\Repository\EtudiantRepository")
 */
class Etudiant
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
     * @ORM\OneToOne(targetEntity="UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="id_e",referencedColumnName="id")
     */
    private $id_e;

    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(name="idClasse",referencedColumnName="idClasse")
     */
    private $idClasse;
    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Utilisateur")
     * @ORM\JoinColumn(name="cin_p",referencedColumnName="id")
     */

    private $cinP;


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
     * Set idClasse
     *
     * @param integer $idClasse
     *
     * @return Etudiant
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

    /**
     * Set cinP
     *
     * @param integer $cinP
     *
     * @return Etudiant
     */
    public function setCinP($cinP)
    {
        $this->cinP = $cinP;

        return $this;
    }

    /**
     * Get cinP
     *
     * @return int
     */
    public function getCinP()
    {
        return $this->cinP;
    }

    /**
     * @return mixed
     */
    public function getIdE()
    {
        return $this->id_e;
    }

    /**
     * @param mixed $id_e
     */
    public function setIdE($id_e)
    {
        $this->id_e = $id_e;
    }

}

