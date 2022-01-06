<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraphs(2, true),
            'content' => $this->faker->paragraphs(5, true),
            'posted_at' => now(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'author_id' => User::factory(),
        ];
    }
}
