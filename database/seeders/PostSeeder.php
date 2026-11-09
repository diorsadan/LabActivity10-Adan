<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $authors = Author::all();

        // 40 published posts, sequence picks one of the existing authors
        // so the factory doesn't make a new author for every post
        Post::factory()
            ->count(40)
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // 10 drafts
        Post::factory()
            ->count(10)
            ->draft()
            ->sequence(fn ($seq) => ['author_id' => $authors->random()->id])
            ->create();

        // my pinned birthday post
        $kagawad = Author::where('email', 'kagawad.adan@bulletin.test')->first();

        Post::create([
            'author_id' => $kagawad->id,
            'title' => 'Purok Adan Clean-up Drive',
            'category' => 'Announcement',
            'body' => 'All residents of Purok Adan are invited to join the clean-up drive. Please bring your own gloves, brooms, and sacks. See you there!',
            'is_published' => true,
            'is_pinned' => true,
            'published_at' => '2026-12-03',
        ]);
    }
}
