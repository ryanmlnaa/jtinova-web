<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortofolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'slug' => 'project-1',
                'judul' => 'Project 1',
                'category_id' => 1,
                'deskripsi' => 'Deskripsi Project 1',
                'klien' => 'Klien 1',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-2',
                'judul' => 'Project 2',
                'category_id' => 2,
                'deskripsi' => 'Deskripsi Project 2',
                'klien' => 'Klien 2',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-3',
                'judul' => 'Project 3',
                'category_id' => 3,
                'deskripsi' => 'Deskripsi Project 3',
                'klien' => 'Klien 3',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-4',
                'judul' => 'Project 4',
                'category_id' => 4,
                'deskripsi' => 'Deskripsi Project 4',
                'klien' => 'Klien 4',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-5',
                'judul' => 'Project 5',
                'category_id' => 5,
                'deskripsi' => 'Deskripsi Project 5',
                'klien' => 'Klien 5',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-6',
                'judul' => 'Project 6',
                'category_id' => 1,
                'deskripsi' => 'Deskripsi Project 6',
                'klien' => 'Klien 6',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-7',
                'judul' => 'Project 7',
                'category_id' => 2,
                'deskripsi' => 'Deskripsi Project 7',
                'klien' => 'Klien 7',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-8',
                'judul' => 'Project 8',
                'category_id' => 3,
                'deskripsi' => 'Deskripsi Project 8',
                'klien' => 'Klien 8',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-9',
                'judul' => 'Project 9',
                'category_id' => 4,
                'deskripsi' => 'Deskripsi Project 9',
                'klien' => 'Klien 9',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
            [
                'slug' => 'project-10',
                'judul' => 'Project 10',
                'category_id' => 5,
                'deskripsi' => 'Deskripsi Project 10',
                'klien' => 'Klien 10',
                'start_date' => '2024-04-23',
                'end_date' => '2024-04-25',
            ],
        ];

        foreach ($data as $portofolio) {
            \App\Models\Portofolio::create($portofolio);
        }

        // create images
        $images = [
            [
                'portfolio_id' => 1,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 1,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 2,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 2,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 3,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 3,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 4,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 4,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 5,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 5,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 6,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 6,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 7,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 7,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 8,
                'image_url' => 'images/pelatihan/xc8TYytKKDpdlMADfGmpBLUItGiQFF904X3VWcX8.png',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 8,
                'image_url' => 'project-8-1.jpg',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 9,
                'image_url' => 'project-9.jpg',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 9,
                'image_url' => 'project-9-1.jpg',
                'is_primary' => 0,
            ],
            [
                'portfolio_id' => 10,
                'image_url' => 'project-10.jpg',
                'is_primary' => 1,
            ],
            [
                'portfolio_id' => 10,
                'image_url' => 'project-10-1.jpg',
                'is_primary' => 0,
            ],
        ];

        foreach ($images as $image) {
            \App\Models\PortfolioImage::create($image);
        }
    }
}
