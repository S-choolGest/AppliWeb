<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formulaire
 *
 * @ORM\Table(name="formulaire")
 * @ORM\Entity
 */
class Formulaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFormulaire", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformulaire;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptionFormulaire", type="string", length=255, nullable=false)
     */
    private $descriptionformulaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnvoi", type="date", nullable=false)
     */
    private $dateenvoi;


}

