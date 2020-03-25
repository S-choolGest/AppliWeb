<?php

namespace SchoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="SchoolBundle\Repository\ClasseRepository")
 */
class Classe
{
    /**
     * @var int
     *
     * @ORM\Column(name="idClasse", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idClasse;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClasse", type="string", length=255)
     */
    private $nomClasse;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * Set nomClasse
     *
     * @param string $nomClasse
     *
     * @return Classe
     */
    public function setNomClasse($nomClasse)
    {
        $this->nomClasse = $nomClasse;

        return $this;
    }

    /**
     * Get nomClasse
     *
     * @return string
     */
    public function getNomClasse()
    {
        return $this->nomClasse;
    }
}

