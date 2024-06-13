<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeminjamanAlatsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('peminjaman_alats')->delete();
        
        
        
    }
}