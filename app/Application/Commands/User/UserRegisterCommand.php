<?php

namespace App\Application\Commands\User;

use Illuminate\Support\Facades\Validator;

class UserRegisterCommand
{
    private $name;
    
    private $email;
    
    private $password;
    
    public function __construct(?string $name, ?string $email, ?string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    
    public function getPassword()
    {
        return $this->password;
    }
    
    
    public function validate()
    {
        return Validator::make([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:App\Domain\User\User'],
            'password' => ['required', 'string', 'min:3']
        ]);
    }
}