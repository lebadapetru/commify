<?php

namespace Database\Seeders;

use App\Models\TaxBand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TaxBand::create([
            'name' => 'Tax Band A',
            'threshold' => 0,
            'rate' => 0,
            'tax' => 0,
        ]);

        TaxBand::create([
            'name' => 'Tax Band B',
            'threshold' => 5000,
            'rate' => 20,
            'tax' => 1000,
        ]);

        TaxBand::create([
            'name' => 'Tax Band C',
            'threshold' => 20000,
            'rate' => 40,
            'tax' => 8000,
        ]);
    }
}
