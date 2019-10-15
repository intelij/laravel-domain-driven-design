<?php

namespace App\Application\Commands\User;

use Illuminate\Support\Facades\Validator;

class UserLoginCommand
{
    
    private $email;
    
    private $password;
    
    public function __construct(?string $email, ?string $password)
    {
        $this->email = $email;
        $this->password = $password;
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
            'email' => $this->email,
            'password' => $this->password
        ], [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:3']
        ]);
    }
}