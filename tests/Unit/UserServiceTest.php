<?php

namespace Tests\Unit;

use App\DTO\UserDTO;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
//    use RefreshDatabase;

    /** @test  */
    public function it_can_create_a_user()
    {
        $userRepository = \Mockery::mock(UserRepository::class);
        $userService = new UserService($userRepository);
        $userDTO = new UserDTO('Test User2', 'testuser2@email.com', 'password2');

        $user = new User([
            'name' => 'Test User2',
            'email' => 'testuser2@email.com',
            'password' => 'password2'
        ]);

        $userRepository->shouldReceive('createUser')
            ->once()
            ->andReturn($user);

        $createdUser = $userService->createUser($userDTO);

        $this->assertEquals($user->name, $createdUser->name);
        $this->assertEquals($user->email, $createdUser->email);
    }
}
