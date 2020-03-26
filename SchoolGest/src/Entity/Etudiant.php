<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_717E22E3284FD025", columns={"id_e"})}, indexes={@ORM\Index(name="IDX_717E22E3EC96170C", columns={"idClasse"}), @ORM\Index(name="IDX_717E22E371F19484", columns={"idParent"})})
 * @ORM\Entity
 */
class Etudiant
{
    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_e", referencedColumnName="id")
     * })
     */
    private $idE;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idParent", referencedColumnName="id")
     * })
     */
    private $idparent;

    /**
     * @var \Classe
     *
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idClasse", referencedColumnName="idClasse")
     * })
     */
    private $idclasse;

    /**
     * @var \FosUser
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}

