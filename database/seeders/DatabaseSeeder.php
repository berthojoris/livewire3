<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bertho',
            'email' => 'berthojoris@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$ifogU5xHOrLjgXx.mR6zOe6PrCx5cqUXhU9cqrn6q5h0EeSMnzgZu',
            'remember_token' => Str::random(10),
        ]);

        // User::factory(3)->create();
        Blog::factory(30)->create();
    }
}
