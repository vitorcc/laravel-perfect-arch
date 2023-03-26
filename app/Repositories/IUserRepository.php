<?php

namespace App\Repositories;

use App\DTO\UserDTO;
use App\Models\User;

interface IUserRepository
{
    public function findAllUsers();
    public function createUser(array $data);
    public function save(User $user);
    public function findById(int $id);
}
