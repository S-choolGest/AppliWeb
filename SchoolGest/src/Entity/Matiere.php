<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere", indexes={@ORM\Index(name="fk_matiere_module", columns={"idModule"}), @ORM\Index(name="fk_matiere_classe", columns={"IdClasse"}), @ORM\Index(name="fk_matiere_prof", columns={"idProf"})})
 * @ORM\Entity
 */
class Matiere
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMatiere", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmatiere;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMatiere", type="string", length=255, nullable=false)
     */
    private $nommatiere;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefMatiere", type="integer", nullable=true)
     */
    private $coefmatiere;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdClasse", referencedColumnName="idClasse")
     * })
     */
    private $idclasse;

    /**
     * @var \Module
     *
     * @ORM\ManyToOne(targetEntity="Module")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idModule", referencedColumnName="idModule")
     * })
     */
    private $idmodule;

    /**
     * @var \Professeur
     *
     * @ORM\ManyToOne(targetEntity="Professeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProf", referencedColumnName="id")
     * })
     */
    private $idprof;


}

