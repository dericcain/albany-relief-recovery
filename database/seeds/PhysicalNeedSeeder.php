<?php

use App\PhysicalNeed;
use Illuminate\Database\Seeder;

class PhysicalNeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PhysicalNeed::insert([
            [
                'name' => 'nonperishable food'
            ],
            [
                'name' => 'water'
            ],
            [
                'name' => 'baby needs'
            ],
            [
                'name' => 'debris removal'
            ],
            [
                'name' => 'home repair'
            ],
            [
                'name' => 'minor medical supplies'
            ]
        ]);
    }
}
