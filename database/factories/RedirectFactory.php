<?php

namespace Combindma\Redirector\Database\Factories;

use Combindma\Redirector\Models\Redirect;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedirectFactory extends Factory
{
    protected $model = Redirect::class;

    public function definition()
    {
        return [
            'old_url' => $this->faker->url,
            'new_url' => $this->faker->url,
            'status' => 301
        ];
    }
}
