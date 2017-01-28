<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::insert([
            [
                'name' => 'admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'worker',
                'slug' => 'worker',
            ],
            [
                'name' => 'user',
                'slug' => 'user',
            ],
        ]);
    }
}
