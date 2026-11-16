<?php

namespace Database\Factories;

use App\Models\Proovedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Proovedor>
 */
class ProovedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique()->numerify('P-####'),
            'nombre' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->numerify('+504 ####-####'),
            'fecha_enrrolamiento' => $this->faker->date(),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo'])
        ];
    }
}
