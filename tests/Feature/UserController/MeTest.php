<?php

namespace Feature\UserController;

use App\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;


class MeTest extends TestCase
{
    public function test_user_me_success(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->getJson('/api/user');

        $response->assertStatus(200);

        $this->assertEquals($user->mobile, $response->json()["data"]["mobile"]);
    }


    public function test_user_me_failed(): void
    {
        $user = User::factory()->create();

        $response = $this->getJson('/api/user');

        $response->assertStatus(401);
    }
}
