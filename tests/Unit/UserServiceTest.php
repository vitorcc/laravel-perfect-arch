<?php

namespace Tests\Unit;

use App\DTO\UserDTO;
use App\Repositories\UserRepository;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test  */
    public function it_can_create_a_user()
    {
        $userRepository = $this->createMock(UserRepository::class);
//        $userRepository = \Mockery::mock(UserRepository::class);
        $userService = new UserService($userRepository);
        $userDTO = new UserDTO('Test User', 'testuser@email.com', 'password');

//        $userRepository->shouldReceive('createUser')
//            ->once()
//            ->andReturn((object)[
//                'name' => 'Test User',
//                'email' => 'test@example.com',
//                'password' => 'password'
//            ]);

        $user = $userService->createUser($userDTO);
        $this->assertEquals('Test User', $user->name);
        $this->assertEquals('testuser@email.com', $user->email);
    }
}
