<?php

namespace Tests\Feature;

use App\User;
use App\Tweet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ViewingAnotherUsersTweetsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create(["username" => "johndoe"]);
        $tweet = factory(Tweet::class)->make(["body" => "My first tweet"]);
        $user->tweets()->save($tweet);

        $response = $this->get('/johndoe');
        $response->assertStatus(200);
        $response->assertSee('My first tweet');
    }
}
