<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parent
 *
 * @ORM\Table(name="parent")
 * @ORM\Entity
 */
class Parent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idParent", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idparent;

    /**
     * @var integer
     *
     * @ORM\Column(name="idEtudiant", type="integer", nullable=false)
     */
    private $idetudiant;

    /**
     * @var string
     *
     * @ORM\Column(name="emailParent", type="string", length=255, nullable=false)
     */
    private $emailparent;

    /**
     * @var integer
     *
     * @ORM\Column(name="numTelParent", type="integer", nullable=false)
     */
    private $numtelparent;


}

