<?php

namespace Database\Seeders;

use App\Models\mapel;
use Illuminate\Database\Seeder;

class MapelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mapel::create(
            [
            'kode' => '274',
            'nama_pelajaran' => 'Sejarah',
            'jam' => '3 jam',
            ],
        );
    }
}
