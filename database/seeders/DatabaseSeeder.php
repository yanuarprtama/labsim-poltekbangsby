<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(AlatsTableSeeder::class);
        $this->call(KritikTableSeeder::class);
        $this->call(LabsTableSeeder::class);
        $this->call(LaporankerusakansTableSeeder::class);
        $this->call(PeminjamanlabsTableSeeder::class);
        $this->call(PeminjamanAlatsTableSeeder::class);
        $this->call(PerawatanlabsTableSeeder::class);
        $this->call(PerbaikanAlatsTableSeeder::class);
        $this->call(ProdisTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(KuesionerTableSeeder::class);
    }
}
