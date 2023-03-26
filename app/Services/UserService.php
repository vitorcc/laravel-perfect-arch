<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\UserRepository;

class UserService implements IUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findAllUsers()
    {
        return $this->userRepository->findAllUsers();
    }

    public function createUser(UserDTO $userDTO)
    {
        return $this->userRepository->createUser([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => $userDTO->password
        ]);
    }

    public function updateUser(int $id, UserDTO $userDTO)
    {
        $user = $this->userRepository->findById($id);
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = $userDTO->password;

        return $this->userRepository->save($user);
    }

    public function deleteUser(int $id)
    {
        $user = $this->userRepository->findById($id);
        return $user->delete();
    }

    public function findById(int $id)
    {
        return $this->userRepository->findById($id);
    }
}
