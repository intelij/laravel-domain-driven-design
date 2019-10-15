<?php

namespace App\Infrastructure\Services\User;

use App\Application\Commands\User\UserLoginCommand;
use App\Domain\User\Services\UserLoginServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserLoginService implements UserLoginServiceInterface
{
    /**
     * @param UserLoginCommand $command
     * @return mixed
     * @throws \Exception
     */
    public function execute(UserLoginCommand $command)
    {
        $token = JWTAuth::attempt([
            'email' => $command->getEmail(),
            'password' => $command->getPassword()
        ]);
        
        if (!$token) {
            throw new \Exception('Invalid Email or Password', 401);
        }
        
        return $token;
        
    }
}