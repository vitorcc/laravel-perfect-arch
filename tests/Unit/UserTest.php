<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
//    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password'
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'test@example.com'
        ]);
    }
}
