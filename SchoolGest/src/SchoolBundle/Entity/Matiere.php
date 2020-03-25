<?php

namespace SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity(repositoryClass="SchoolBundle\Repository\MatiereRepository")
 */
class Matiere
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMatiere", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idMatiere;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMatiere", type="string", length=255)
     */
    private $nomMatiere;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Set nomMatiere
     *
     * @param string $nomMatiere
     *
     * @return Matiere
     */
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    /**
     * Get nomMatiere
     *
     * @return string
     */
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }
}

