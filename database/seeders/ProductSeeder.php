<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use App\Models\Product;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for ($i=0; $i <30 ; $i++) {
            Product::create([
                'title' => $faker->sentence(10),
                'subtitle' => $faker->sentence(10),
                'slug' => $faker->slug,
                'description' => $faker->sentence(15),
                'price' => random_int(10,300)*100,
                'stocks' => random_int(1,5),
                'image' => "vtydyu54vytcytt.jpg",
                'rating' => random_int(1,5),
            ])->categories()->attach([
                rand(1,4),
                rand(1,4)
            ]);
        }
    }
}
