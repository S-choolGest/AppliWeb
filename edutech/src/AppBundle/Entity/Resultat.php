<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resultat
 *
 * @ORM\Table(name="resultat")
 * @ORM\Entity
 */
class Resultat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idResultat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idresultat;

    /**
     * @var integer
     *
     * @ORM\Column(name="etatResultat", type="integer", nullable=false)
     */
    private $etatresultat;


}

