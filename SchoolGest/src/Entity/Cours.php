<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours", indexes={@ORM\Index(name="fk_cours_matiere", columns={"idMatiere"})})
 * @ORM\Entity
 */
class Cours
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCours", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcours;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCours", type="string", length=255, nullable=true)
     */
    private $nomcours;

    /**
     * @var string
     *
     * @ORM\Column(name="fichier", type="string", length=200, nullable=true)
     */
    private $fichier;

    /**
     * @var \Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMatiere", referencedColumnName="idMatiere")
     * })
     */
    private $idmatiere;


}

