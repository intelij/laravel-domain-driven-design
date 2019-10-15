<?php

namespace App\Domain\User;


interface UserRepositoryInterface
{
    public function create(User $user): void;
}