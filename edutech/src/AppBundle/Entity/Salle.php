<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity
 */
class Salle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSalle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsalle;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSalle", type="string", length=255, nullable=false)
     */
    private $nomsalle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="disponibilite", type="boolean", nullable=false)
     */
    private $disponibilite;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbPlaces", type="integer", nullable=false)
     */
    private $nbplaces;


}

