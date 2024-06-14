<?php

namespace Database\Seeders;

use App\Models\WebConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebConfig::create([
            'name' => 'Teaching Factory JTI Innovation',
            'alias' => 'TEFA JTI',
            'brand_logo' => 'static/logo.png',
            'video' => 'https://www.youtube.com/embed/q_Zcv3KHXh4?si=_tXWUHMbT8mr4bnR',
            'video_preview' => 'https://www.youtube.com/embed/q_Zcv3KHXh4?si=_tXWUHMbT8mr4bnR',
            'introduction' => 'Teaching Factory (TEFA) merupakan sarana unggulan yang di miliki Politeknik untuk mewujudkan sistem pembelajaran vokasi berbasis kompetensi, disiplin, terampil, dan mandiri. Tefa memiliki konsep pembelajaran vokasi berbasis produksi atau jasa yang mengacu kepada standar dan prosedur yang berlaku di industri.',
            'profil_link' => 'https://www.tefa-jti.com',
            'map' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15797.788310154803!2d113.7228623!3d-8.1576302!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4618d7137a4cf5c1!2sGedung%20Jurusan%20TI%20Politeknik%20Negeri%20Jember!5e0!3m2!1sid!2sid!4v1624118356426!5m2!1sid!2sid',
            'location' => 'Jl. Mastrip No. 52, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121',
            'open_hours' => 'Senin - Jumat, 08.00 - 16.00 WIB',
            'email' => 'jtinova@polije.ac.id',
            'phone' => '081234567890',
            'facebook' => 'https://www.facebook.com/tefa.jti',
            'twitter' => 'https://www.twitter.com/tefa_jti',
            'instagram' => 'https://www.instagram.com/tefa_jti',
            'youtube' => 'https://www.youtube.com/tefa_jti',
            'manager' => 'Ely Mulyadi, S.E., M.Kom.',
            'nip' => '19730617 201805 1 001',
        ]);
    }
}
