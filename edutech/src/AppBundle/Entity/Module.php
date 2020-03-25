<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *
 * @ORM\Table(name="module")
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


}

