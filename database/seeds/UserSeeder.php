<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'deric.cain@gmail.com',
            'name' => 'Deric Cain',
            'password' => bcrypt('H3lping0thers'),
            'group_id' => 1
        ]);

        User::create([
            'email' => 'kristi@thegroves.church',
            'name' => 'Kristi Steffens',
            'password' => bcrypt('H3lping0thers'),
            'group_id' => 1
        ]);
    }
}
