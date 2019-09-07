<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminID = DB::table('users')->insertGetId([
            'name' => 'Jan',
            'surname' => 'Kowalski',
            'email' => 'jan.kowalski@example.com',
            'password' => bcrypt('secret123'),
            'login' => 'Jan Kowalski',
            'country' => 'Poland',
            'city' => 'Bielsko-Biala',
            'street_address' => 'Warszawska 123',
            'education' => 'higher',
            'admin' => true,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        $interestID = DB::table('interests')->first()->id;

        DB::table('interest_user')->insert([
            'user_id' => $adminID,
            'interest_id' => $interestID,
        ]);
    }
}
