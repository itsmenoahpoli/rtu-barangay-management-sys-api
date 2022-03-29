<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Residents\ResidentRecord;

class ResidentRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResidentRecord::factory()
                        ->count(15)
                        ->create();
    }
}
