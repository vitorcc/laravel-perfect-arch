<?php

namespace App\DTO;

class UserDTO
{
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

}
