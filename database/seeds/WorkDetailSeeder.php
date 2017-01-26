<?php

use App\WorkDetail;
use Illuminate\Database\Seeder;

class WorkDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WorkDetail::insert([
            [
                'name' => 'home repair'
            ],
            [
                'name' => 'trees cut'
            ],
            [
                'name' => 'tarp'
            ],
            [
                'name' => 'debris cleaned'
            ]
        ]);
    }
}
