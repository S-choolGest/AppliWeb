<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation", indexes={@ORM\Index(name="IDX_F4DD61D328472E25", columns={"idProf"}), @ORM\Index(name="IDX_F4DD61D3EC96170C", columns={"idClasse"})})
 * @ORM\Entity
 */
class Affectation
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
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProf", referencedColumnName="id")
     * })
     */
    private $idprof;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClasse", referencedColumnName="idClasse")
     * })
     */
    private $idclasse;


}

