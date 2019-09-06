<?php

use Illuminate\Database\Seeder;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
