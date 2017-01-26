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
                'name' => 'food'
            ],
            [
                'name' => 'toiletries'
            ],
            [
                'name' => 'meals'
            ],
            [
                'name' => 'cleaning supplies'
            ],
            [
                'name' => 'water'
            ],
            [
                'name' => 'pet food'
            ]
        ]);
    }
}
