<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i < 50 ; $i++) { 
          
        $product = new Product();
        $product->name = $faker->name;
        $product->description = $faker->text;
        $product->image = '1697438188.jpg';
        $product->save();
          # code...
        }
    }
}
