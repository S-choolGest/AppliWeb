<?php

namespace BibliothequeBundle\Repository;

/**
 * BibliothequeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BibliothequeRepository extends \Doctrine\ORM\EntityRepository
{
    public function getAllBiblios(){
        $query = $this->getEntityManager()->createQuery('select b from BibliothequeBundle:Bibliotheque b');
        return $query->getArrayResult();
    }
}
