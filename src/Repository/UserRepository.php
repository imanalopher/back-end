<?php

namespace App\Repository;


use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getAll()
    {
        return $this->createQueryBuilder('u')
            ->select('u.id', 'u.firstname', 'u.lastname', 'u.age', 'u.bio')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }

    public function get($id)
    {
        return $this->createQueryBuilder('u')
            ->select('u.id', 'u.firstname', 'u.lastname', 'u.age', 'u.bio')
            
	    ->where('u.id = :id')
		->getQuery()
	    ->setParameter('id', $id)
            ->getOneOrNullResult();
    }
}
