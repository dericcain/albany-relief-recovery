<?php

use App\Need;
use Illuminate\Database\Seeder;

class NeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 200; $i++) {
            $need = factory(Need::class)->create();
            $need->workDetails()->attach($faker->randomElements([1, 2, 3, 4], 3));
            $need->physicalNeeds()->attach($faker->randomElements([1, 2, 3, 4, 5], 4));
        }
    }
}
