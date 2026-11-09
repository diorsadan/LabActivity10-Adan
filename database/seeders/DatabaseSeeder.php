<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // authors first because posts need an author_id
        $this->call([
            AuthorSeeder::class,
            PostSeeder::class,
        ]);
    }
}
