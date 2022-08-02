<?php

namespace Database\Seeders;

use App\Models\siswa;
use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        siswa::create(
            [
            'nis' => '27438',
            'nama' => 'wiwin',
            'tgl_lahir' => '10 januari 1990',
            'jk' => 'perempuan',
            ],
        );
    }
}
