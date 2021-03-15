<?php

namespace Database\Factories\Learning;

use App\Models\Learning\Resource;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Learning\{Source, Status};

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'title' => $this->faker->sentence(5),
          'author' => $this->faker->name,
          'url' => $this->faker->url,
          'skills' => $this->faker->sentence(3),
          'note' => $this->faker->sentence(10),
          'source_id' => Source::pluckId(),
          'status_id' => Status::pluckId()
        ];
    }
}
