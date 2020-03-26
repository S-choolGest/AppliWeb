<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt", indexes={@ORM\Index(name="fk_livre", columns={"idLivre"}), @ORM\Index(name="fk_emprunt_user", columns={"idEmprunteur"})})
 * @ORM\Entity
 */
class Emprunt
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
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmprunt", type="date", nullable=false)
     */
    private $dateemprunt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateConfirmation", type="date", nullable=true)
     */
    private $dateconfirmation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRendu", type="date", nullable=true)
     */
    private $daterendu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmprunteur", referencedColumnName="id")
     * })
     */
    private $idemprunteur;

    /**
     * @var \Livre
     *
     * @ORM\ManyToOne(targetEntity="Livre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLivre", referencedColumnName="id")
     * })
     */
    private $idlivre;


}

