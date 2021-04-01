<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $body='<p class="paragraph">'.$this->faker->sentence($nbWords = 50, $variableNbWords = true).'</p>';
        return [
            'title' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'body' => $body,
            'description' => $this->faker->text($maxNbChars = 200),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 6),
        ];
    }
    
}
