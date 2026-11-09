<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        Author::create([
            'name' => 'Kagawad Dion Ren Adan',
            'position' => 'Kagawad',
            'email' => 'kagawad.adan@bulletin.test',
        ]);

        Author::factory()->count(4)->create();
    }
}
