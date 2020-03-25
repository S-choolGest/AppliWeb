<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membrescolarite
 *
 * @ORM\Table(name="membrescolarite")
 * @ORM\Entity
 */
class Membrescolarite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idMscolarite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmscolarite;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMscolarite", type="string", length=255, nullable=false)
     */
    private $nommscolarite;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomMscolaire", type="string", length=255, nullable=false)
     */
    private $prenommscolaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="cinMscolaire", type="integer", nullable=false)
     */
    private $cinmscolaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissMscolaire", type="date", nullable=false)
     */
    private $datenaissmscolaire;

    /**
     * @var integer
     *
     * @ORM\Column(name="numTelMscolaire", type="integer", nullable=false)
     */
    private $numtelmscolaire;

    /**
     * @var string
     *
     * @ORM\Column(name="emailMscolaire", type="string", length=255, nullable=false)
     */
    private $emailmscolaire;


}

