<?php

namespace Database\Seeders;

use App\Models\Boulder;
use Illuminate\Database\Seeder;

class BoulderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Boulder::factory()->count(10)->create();
    }
}
