<?php

namespace SchoolBundle\Repository;

/**
 * AbsenceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AbsenceRepository extends \Doctrine\ORM\EntityRepository
{
    function classeProf($id)
    {
        $query=$this->getEntityManager()
            ->createQuery(' Select nomClasse FROM SchoolBundle:classe  c, UtilisateurBundle:Utilisateur u , SchoolBundle:affectation a where a.idClasse=c.idClasse and a.idProf=u.id and u.roles LIKE "%ROLE_PROFESSEUR%" a.idProf=:id')
            ->setParameters(array('id'=>$id));
        return $query->getResult();

    }



}
