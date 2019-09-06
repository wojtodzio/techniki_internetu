<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['shirt' => 79.99, 'boots' => 99.99, 'chair' => 87.23, 'bed' => 1099.99] as $name => $price)
        {
            DB::table('products')->insert([
                'name' => $name,
                'price' => $price,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);
        }
    }
}
