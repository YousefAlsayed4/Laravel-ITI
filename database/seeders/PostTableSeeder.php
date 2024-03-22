<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User; // Fix the namespace here

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        User::factory()->count(10)->create(); 
        Post::factory(50)->create();
    }
}
