<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bibliotheque
 *
 * @ORM\Table(name="bibliotheque", uniqueConstraints={@ORM\UniqueConstraint(name="adresse", columns={"adresse"}), @ORM\UniqueConstraint(name="unique_id_bibliothecaire", columns={"id_bibliothecaire"})})
 * @ORM\Entity
 */
class Bibliotheque
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacite", type="integer", nullable=false)
     */
    private $capacite;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

    /**
     * @var \Bibliothecaire
     *
     * @ORM\ManyToOne(targetEntity="Bibliothecaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bibliothecaire", referencedColumnName="id")
     * })
     */
    private $idBibliothecaire;


}

