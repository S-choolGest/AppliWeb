<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialite
 *
 * @ORM\Table(name="specialite")
 * @ORM\Entity
 */
class Specialite
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSpecialite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idspecialite;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSpecialite", type="string", length=255, nullable=false)
     */
    private $nomspecialite;


}

