<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
//    use RefreshDatabase; //limpa banco após teste

    /** @test */
    public function it_can_create_a_user()
    {
        $userData = [
          'name' => 'name teste',
          'email' => 'email@test',
          'password' => 'password'
        ];

        $response = $this->postJson('/api/user', $userData);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'name',
            'email',
        ]);
        $this->assertDatabaseHas('users', [
            'name' => 'name teste',
            'email' => 'email@test',
        ]);
    }

    /** @test */
    public function it_cannot_create_a_user_without_a_name()
    {
        $userData = [
            'email' => 'email@teste',
            'password' => 'password'
        ];

        $response = $this->postJson('/api/user', $userData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');

    }

    /** @test */
    public function it_cannot_create_a_user_without_a_password()
    {
        $userData = [
            'name' => 'name teste',
            'email' => 'email@teste',
        ];

        $response = $this->postJson('/api/user', $userData);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors('password');

    }

}
