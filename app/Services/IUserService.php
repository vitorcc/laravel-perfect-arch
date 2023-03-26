<?php

namespace App\Services;

use App\DTO\UserDTO;

interface IUserService
{
    public function findAllUsers();
    public function createUser(UserDTO $userDTO);
    public function updateUser(int $id, UserDTO $userDTO);
    public function deleteUser(int $id);
    public function findById(int $id);
}
