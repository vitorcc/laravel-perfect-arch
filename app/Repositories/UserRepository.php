<?php

namespace App\Repositories;

use App\DTO\UserDTO;
use App\Models\User;

class UserRepository implements IUserRepository
{
    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function findAllUsers()
    {
        return User::all();
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function save(User $user)
    {
        $user->save();
        return $user;
    }
}
