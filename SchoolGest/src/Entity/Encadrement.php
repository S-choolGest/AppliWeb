<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Encadrement
 *
 * @ORM\Table(name="encadrement", indexes={@ORM\Index(name="fk_pfe_encardrement", columns={"id_pfe"}), @ORM\Index(name="encadrement_ibfk_1", columns={"id_prof"})})
 * @ORM\Entity
 */
class Encadrement
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
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var \Professeur
     *
     * @ORM\ManyToOne(targetEntity="Professeur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_prof", referencedColumnName="id")
     * })
     */
    private $idProf;

    /**
     * @var \Pfe
     *
     * @ORM\ManyToOne(targetEntity="Pfe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pfe", referencedColumnName="id")
     * })
     */
    private $idPfe;


}

