<?php

namespace Database\Seeders;

use App\Models\guru;
use Illuminate\Database\Seeder;

class GuruTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        guru::create(
            [
            'nip' => '2228',
            'nama' => 'Ahmad',
            'tgl_lahir' => '28 Juli 1967',
            'jk' => 'Laki-laki',
            ],
             );
    }
}
