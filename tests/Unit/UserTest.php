<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAUserCanBeFoundByUsername()
    {

        $createdUser = factory(User::class)->create(['username' => 'janedoe']);
        $foundUser = User::findByUsername('janedoe');
        $this->assertEquals($createdUser->id, $foundUser->id);
        $this->assertEquals($createdUser->username, $foundUser->username);
    }
}
