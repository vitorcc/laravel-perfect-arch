<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(Request $request)
    {
        $userDTO = new UserDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        $user = $this->userService->createUser($userDTO);

        return response()->json($user);
    }

    public function findById($id)
    {
        return $this->userService->findById($id);
    }

    public function findAll()
    {
        return $this->userService->findAllUsers();
    }

    public function delete(int $id)
    {
        return $this->userService->deleteUser($id);
    }

    public function update($id, Request $request)
    {
        $userDTO = new UserDTO(
            $request->input('name'),
            $request->input('email'),
            $request->input('password')
        );

        return $this->userService->updateUser($id, $userDTO);
    }

}
