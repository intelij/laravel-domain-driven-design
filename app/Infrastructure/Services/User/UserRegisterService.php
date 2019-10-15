<?php
/**
 * Created by PhpStorm.
 * User: igorstasevich
 * Date: 2019-03-27
 * Time: 17:04
 */

namespace App\Infrastructure\Services\User;

use App\Application\Commands\User\UserRegisterCommand;
use App\Domain\User\Services\UserRegistrationServiceInterface;
use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserRegisterService implements UserRegistrationServiceInterface
{
    protected $userRepository;
    
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->userRepository = $repository;
    }
    
    /**
     * @param UserRegisterCommand $command
     * @return mixed
     */
    public function execute(UserRegisterCommand $command)
    {
        $user = new User(
            $command->getName(),
            $command->getEmail(),
            Hash::make($command->getPassword())
        );
        
        $this->userRepository->create($user);
        
        return JWTAuth::fromUser($user);
    }
}