<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Volleyball', 'Skiing', 'Computer Science', 'Being PW student', 'Finishing PW ASAP'] as $interest)
        {
            DB::table('interests')->insert([
                'name' => $interest
            ]);
        }
    }
}
