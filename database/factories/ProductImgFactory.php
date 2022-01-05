<?php

namespace Database\Factories;

use App\Models\ProductImg;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImgFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImg::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id'=> 1,
            'img'=>'vtydyu54vytcytt.jpg',
        ];
    }
}
