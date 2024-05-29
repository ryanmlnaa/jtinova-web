<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'PHP',
                'slug' => 'php',
                'description' => 'PHP is a popular general-purpose scripting language that is especially suited to web development.',
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'description' => 'JavaScript is a lightweight, interpreted programming language.',
            ],
            [
                'name' => 'Python',
                'slug' => 'python',
                'description' => 'Python is an interpreted, high-level and general-purpose programming language.',
            ],
            [
                'name' => 'Java',
                'slug' => 'java',
                'description' => 'Java is a class-based, object-oriented programming language.',
            ],
            [
                'name' => 'Ruby',
                'slug' => 'ruby',
                'description' => 'Ruby is an open-source and fully object-oriented programming language.',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
