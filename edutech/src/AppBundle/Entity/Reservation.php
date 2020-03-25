<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
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
     * @var integer
     *
     * @ORM\Column(name="id_utilisateur", type="integer", nullable=false)
     */
    private $idUtilisateur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_bibliotheque", type="integer", nullable=false)
     */
    private $idBibliotheque;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_debut", type="datetime", nullable=false)
     */
    private $heureDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heure_final", type="datetime", nullable=false)
     */
    private $heureFinal;


}

