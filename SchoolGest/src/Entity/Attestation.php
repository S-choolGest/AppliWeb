<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attestation
 *
 * @ORM\Table(name="attestation")
 * @ORM\Entity
 */
class Attestation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idAttestation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idattestation;


}

