<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $tags = [
      'Technology',
      'Business',
      'Finance',
      'Design',
      'Education',
      'Marketing',
      'Events',
      'Startup',
      'Productivity',
      'Health',
      'AI',
      'Web Development',
      'React',
      'Laravel',
      'PHP',
      'Community',
      'Career',
      'Innovation',
      'Creative',
      'Conference'
    ];
    //


    return [
      'name' => fake()->unique()->randomElement($tags),
    ];
  }
}
