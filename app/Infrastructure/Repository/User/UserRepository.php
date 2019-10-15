<?php

namespace App\Infrastructure\Repository\User;

use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface;
use App\Infrastructure\Repository\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    
    /**
     * @param User $user
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(User $user): void
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }
    
    /**
     * @return string
     */
    protected function getEntityName()
    {
        return User::class;
    }
}