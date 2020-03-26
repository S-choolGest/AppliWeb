<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="module", indexes={@ORM\Index(name="fk_module_Specialite", columns={"idSpecialite"}), @ORM\Index(name="fk_module_classe", columns={"classe"})})
 * @ORM\Entity
 */
class Module
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idModule", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmodule;

    /**
     * @var string
     *
     * @ORM\Column(name="nomModule", type="string", length=255, nullable=false)
     */
    private $nommodule;

    /**
     * @var integer
     *
     * @ORM\Column(name="coefModule", type="integer", nullable=false)
     */
    private $coefmodule;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float", precision=10, scale=0, nullable=false)
     */
    private $moyenne;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="classe", referencedColumnName="idClasse")
     * })
     */
    private $classe;

    /**
     * @var \Specialite
     *
     * @ORM\ManyToOne(targetEntity="Specialite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idSpecialite", referencedColumnName="idSpecialite")
     * })
     */
    private $idspecialite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="FosUser", mappedBy="module")
     */
    private $etudiant;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etudiant = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

