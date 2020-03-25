<?php

namespace SchoolBundle\Repository;

use Doctrine\ORM\Query;

/**
 * AffectationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
use Doctrine\ORM\Query\Expr;
class AffectationRepository extends \Doctrine\ORM\EntityRepository
{
    public function getNomClasseByUser($userId)
    {
        dump($userId);
        $qb = $this
            ->createQueryBuilder('ca')

                ->select('c.nomClasse')
                ->from('SchoolBundle:Classe ', 'c')
                ->Join('SchoolBundle:Affectation ', 'a',Expr\Join::WITH,'a.idClasse = ca.idClasse')
                ->Where('a.idProf =: id')
                ->setParameter('id', $userId);

            dump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
        /*$query=$this->getEntityManager()
                ->createQuery("Select DISTINCT c.nomClasse FROM SchoolBundle:Classe  c, UserBundle:Utilisateur u , SchoolBundle:Affectation a where a.idClasse=c.idClasse and a.idProf=:id")
                ->setParameters(array('id'=>$userId));
               dump($query->getResult());
            return $query->getResult(Query::HYDRATE_ARRAY); */
    }

}
