<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bibliothecaire
 *
 * @ORM\Table(name="bibliothecaire")
 * @ORM\Entity
 */
class Bibliothecaire
{
    /**
     * @var \Utilisateur
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

