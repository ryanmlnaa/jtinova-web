<?php

namespace Database\Seeders;

use App\Models\Keahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'PHP'],
            ['nama' => 'Laravel'],
            ['nama' => 'VueJS'],
            ['nama' => 'ReactJS'],
            ['nama' => 'Angular'],
            ['nama' => 'NodeJS'],
            ['nama' => 'ExpressJS'],
            ['nama' => 'Python'],
            ['nama' => 'Django'],
            ['nama' => 'Flask'],
            ['nama' => 'Java'],
            ['nama' => 'Spring'],
            ['nama' => 'Kotlin'],
            ['nama' => 'Android'],
            ['nama' => 'Swift'],
            ['nama' => 'iOS'],
            ['nama' => 'Flutter'],
            ['nama' => 'Dart'],
            ['nama' => 'Ruby'],
            ['nama' => 'Ruby on Rails'],
            ['nama' => 'Go'],
            ['nama' => 'Rust'],
            ['nama' => 'C#'],
            ['nama' => 'ASP.NET'],
            ['nama' => 'C++'],
            ['nama' => 'C'],
            ['nama' => 'Objective-C'],
            ['nama' => 'Perl'],
            ['nama' => 'HTML'],
            ['nama' => 'CSS'],
            ['nama' => 'JavaScript'],
            ['nama' => 'TypeScript'],
            ['nama' => 'SQL'],
            ['nama' => 'NoSQL'],
            ['nama' => 'MongoDB'],
            ['nama' => 'MySQL'],
            ['nama' => 'PostgreSQL'],
            ['nama' => 'SQLite'],
            ['nama' => 'MariaDB'],
            ['nama' => 'Oracle'],
            ['nama' => 'SQL Server'],
            ['nama' => 'Firebase'],
            ['nama' => 'Docker'],
            ['nama' => 'Kubernetes'],
            ['nama' => 'Jenkins'],
            ['nama' => 'Git'],
            ['nama' => 'GitHub'],
            ['nama' => 'GitLab'],
            ['nama' => 'Bitbucket'],
        ];

        Keahlian::insert($data);
    }
}
