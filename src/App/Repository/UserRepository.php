<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\User;
use Doctrine\ORM\Query;

/**
 * A fake repository so we don't have to set up a DB
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function find($id, $lockMode = null, $lockVersion = null): ?User
    {
        $id = (int) $id;

        return $id === 123 ? new User($id) : null;
    }

    public function findxAll(): array
    {
        $query = $this
            ->createQueryBuilder('c')
            ->getQuery();
        return $query->getResult(Query::HYDRATE_ARRAY);
    }
}
