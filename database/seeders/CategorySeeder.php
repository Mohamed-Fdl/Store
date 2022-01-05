<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'High Tech',
            'slug' => 'high-tech'
        ]);

        Category::create([
            'name' => 'Livres',
            'slug' => 'livres'
        ]);

        Category::create([
            'name' => 'Meubles',
            'slug' => 'meubles'
        ]);

        Category::create([
            'name' => 'Jeux',
            'slug' => 'jeux'
        ]);

        Category::create([
            'name' => 'Nourriture',
            'slug' => 'nourriture'
        ]);
    }
}
