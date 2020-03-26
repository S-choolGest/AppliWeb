<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", indexes={@ORM\Index(name="fk_etudiant_note", columns={"etudiant"}), @ORM\Index(name="fk_matiere_note", columns={"matiere"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idNote", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnote;

    /**
     * @var float
     *
     * @ORM\Column(name="noteDS", type="float", precision=10, scale=0, nullable=true)
     */
    private $noteds;

    /**
     * @var float
     *
     * @ORM\Column(name="noteEXAMEN", type="float", precision=10, scale=0, nullable=true)
     */
    private $noteexamen;

    /**
     * @var float
     *
     * @ORM\Column(name="noteCC", type="float", precision=10, scale=0, nullable=true)
     */
    private $notecc;

    /**
     * @var \Etudiant
     *
     * @ORM\ManyToOne(targetEntity="Etudiant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="etudiant", referencedColumnName="id")
     * })
     */
    private $etudiant;

    /**
     * @var \Matiere
     *
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="matiere", referencedColumnName="idMatiere")
     * })
     */
    private $matiere;


}

