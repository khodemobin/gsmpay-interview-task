<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->has(factory: Post::factory()->count(3))
            ->create(attributes: [
                'name' => 'Test User',
                'mobile' => '09121111111',
            ]);

    }
}
