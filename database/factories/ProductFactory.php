<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'merk' => $this->faker->numberBetween(1, 3),
            'harga' => $this->faker->numberBetween(1000, 9000),
            'deskripsi' => $this->faker->paragraph(),
            'stok' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
