<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService implements IUserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function findAllUsers(): Collection
    {
        $users = $this->userRepository->findAllUsers();
        if($users->isEmpty()){
            throw new NotFoundHttpException('No users found');
        }
        return $users;
    }

    public function createUser(UserDTO $userDTO): User
    {
        return $this->userRepository->createUser([
            'name' => $userDTO->name,
            'email' => $userDTO->email,
            'password' => $userDTO->password
        ]);
    }

    public function updateUser(int $id, UserDTO $userDTO): User
    {
        $user = $this->userRepository->findById($id);
        if(!$user){
            throw new \Exception('User not found');
        }
        $user->name = $userDTO->name;
        $user->email = $userDTO->email;
        $user->password = $userDTO->password;

        $this->userRepository->save($user);

        return $user;
    }

    /**
     * @throws \Exception
     */
    public function deleteUser(int $id): bool
    {
        $user = $this->findById($id);
        return $user->delete();
    }

    /**
     * @throws \Exception
     */
    public function findById(int $id): ?Model
    {
        $user = $this->userRepository->findById($id);
        if(!$user){
            throw new NotFoundHttpException('User not found');
        }
        return $user;
    }
}
