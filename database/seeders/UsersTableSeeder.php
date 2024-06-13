<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Admin Lab',
                'nomorinduk' => '1',
                'password' => '$2y$12$DXlpGOuXRNLrzJU5eRh6ZOHmHBatsaVe2psSFerbXO9aCZyPE0uca',
                'role' => 'Super Admin',
                'prodi' => '1',
                'jenis_pengguna' => 'Admin Lab',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2024-06-12 05:36:40',
            ),
        ));
        
        
    }
}