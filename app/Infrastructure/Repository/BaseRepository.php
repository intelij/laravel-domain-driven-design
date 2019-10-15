<?php

namespace App\Infrastructure\Repository;

use Doctrine\ORM\EntityManager;

abstract class BaseRepository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;
    
    protected $entityRepository;
    
    /**
     * BaseRepository constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository($this->getEntityName());
        
    }
    
    /**
     * @return string
     */
    abstract protected function getEntityName();
}