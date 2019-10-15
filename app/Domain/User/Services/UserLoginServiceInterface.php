<?php

namespace App\Domain\User\Services;

use App\Application\Commands\User\UserLoginCommand;

interface UserLoginServiceInterface
{
    public function execute(UserLoginCommand $command);
}