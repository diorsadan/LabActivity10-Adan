<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        // my kagawad, made by hand not by the factory
        Author::create([
            'name' => 'Kagawad Dion Ren Adan',
            'position' => 'Kagawad',
            'email' => 'kagawad.adan@bulletin.test',
        ]);

        // 4 random authors, total 5
        Author::factory()->count(4)->create();
    }
}
