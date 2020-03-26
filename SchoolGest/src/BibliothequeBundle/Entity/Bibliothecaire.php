<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\Utilisateur;

/**
 * Bibliothecaire
 *
 * @ORM\Table(name="bibliothecaire")
 * @ORM\Entity
 */
class Bibliothecaire extends Utilisateur
{
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

    /**
     * @return \FosUser
     */
    public function getId()
    {
        return $this -> id;
    }

    /**
     * @param \FosUser $id
     */
    public function setId($id)
    {
        $this -> id = $id;
    }


}

