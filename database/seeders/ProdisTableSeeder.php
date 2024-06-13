<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProdisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('prodis')->delete();
        
        \DB::table('prodis')->insert(array (
            0 => 
            array (
                'id' => 1,
                'kode' => 'ADM',
                'nama' => 'Admin',
                'deskripsi' => 'Khusus Admin',
                'gambar' => NULL,
                'status' => 'AKTIF',
                'created_at' => '2024-06-12 05:18:35',
                'updated_at' => '2024-06-12 05:18:35',
            ),
        ));
        
        
    }
}