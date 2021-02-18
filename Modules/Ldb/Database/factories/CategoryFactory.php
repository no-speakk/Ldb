<?php
namespace Modules\Ldb\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Ldb\Entities\Category;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'url' => $this->faker->url,
            'parent_id' => 0,
        ];
    }
}

