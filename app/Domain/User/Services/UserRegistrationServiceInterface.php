<?php

namespace App\Domain\User\Services;

use App\Application\Commands\User\UserRegisterCommand;

interface UserRegistrationServiceInterface
{
    public function execute(UserRegisterCommand $command);
}