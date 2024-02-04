<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

          DB::table('users')->insert([
            'id' => 1,
            'pesantren' => 'al-hikmah',
            'provinsi' => 'Jawa Timur',
            'kabupaten' => 'Banyuwangi',
            'kota' => 'muncar',
            'alamat' => 'Tembokrejo',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
