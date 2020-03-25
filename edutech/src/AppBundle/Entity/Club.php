<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity
 */
class Club
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idClub", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idclub;

    /**
     * @var string
     *
     * @ORM\Column(name="nomClub", type="string", length=255, nullable=false)
     */
    private $nomclub;

    /**
     * @var string
     *
     * @ORM\Column(name="categorieClub", type="string", length=255, nullable=false)
     */
    private $categorieclub;


}

