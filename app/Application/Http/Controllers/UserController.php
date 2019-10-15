<?php

namespace App\Application\Http\Controllers;

use App\Application\Commands\User\UserLoginCommand;
use App\Application\Commands\User\UserRegisterCommand;
use App\Domain\User\Services\UserLoginServiceInterface;
use App\Domain\User\Services\UserRegistrationServiceInterface;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * @var UserRegistrationServiceInterface
     */
    private $registrationService;
    /**
     * @var UserLoginServiceInterface
     */
    private $loginService;
    
    /**
     * UserController constructor.
     *
     * @param UserRegistrationServiceInterface $registrationService
     * @param UserLoginServiceInterface $loginService
     */
    public function __construct(
        UserRegistrationServiceInterface $registrationService,
        UserLoginServiceInterface $loginService
    )
    {
        $this->registrationService = $registrationService;
        $this->loginService = $loginService;
    }
    
    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function register(Request $request)
    {
        $command = new UserRegisterCommand(
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );
    
        $validation = $command->validate();
    
        if ($validation->fails()) {
            throw new \Exception($validation->getMessageBag(), 400);
        }
        
        return [
            'token' => $this->registrationService->execute($command)
        ];
    }
    
    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function login(Request $request)
    {
        $command = new UserLoginCommand(
            $request->get('email'),
            $request->get('password')
        );
    
        $validation = $command->validate();
    
        if ($validation->fails()) {
            throw new \Exception($validation->getMessageBag(), 400);
        }
        
        try {
            $token = $this->loginService->execute($command);
        } catch (\Exception $e) {
            throw $e;
        }
        
        return [
            'success' => true,
            'token' => $token
        ];
    }
}