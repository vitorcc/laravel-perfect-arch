<?php

namespace App\Http\Controllers;

use App\DTO\UserDTO;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(UserRequest $request): JsonResponse
    {
        try {
            $userDTO = new UserDTO(
                $request->input('name'),
                $request->input('email'),
                $request->input('password')
            );

            $user = $this->userService->createUser($userDTO);

            return response()->json($user, ResponseAlias::HTTP_CREATED);
        }catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function findById($id): JsonResponse
    {
        try {
            $user = $this->userService->findById($id);
            return response()->json($user, ResponseAlias::HTTP_OK);
        }catch (NotFoundHttpException $notFoundHttpException){
            return response()->json(
                ['error' => $notFoundHttpException->getMessage()],
                ResponseAlias::HTTP_NOT_FOUND
            );
        }catch (\Exception $e){
            return response()->json(
                ['error' => $e->getMessage()],
                ResponseAlias::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function findAll(): JsonResponse
    {
        try {
            $users = $this->userService->findAllUsers();
            return response()->json($users, ResponseAlias::HTTP_OK);
        }catch (\Exception $e){
            return response()->json(
                ['error' => $e->getMessage()],
                ResponseAlias::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $this->userService->deleteUser($id);
            return response()->json(
                ['message' =>'User deleted successfully'],
                ResponseAlias::HTTP_OK
            );
        }catch (NotFoundHttpException $notFoundHttpException){
            return response()->json(
                ['error' => $notFoundHttpException->getMessage()],
                ResponseAlias::HTTP_NOT_FOUND
            );
        }catch (\Exception $e){
            return response()->json(
                ['error' => $e->getMessage()],
                ResponseAlias::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }

    public function update($id, Request $request): JsonResponse
    {
        try {
            $userDTO = new UserDTO(
                $request->input('name'),
                $request->input('email'),
                $request->input('password')
            );
            $user = $this->userService->updateUser($id, $userDTO);
            return response()->json($user, ResponseAlias::HTTP_OK);
        }catch (\Exception $e){
            return response()->json([
                'error' => $e->getMessage()
            ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
