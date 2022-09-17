<?php

namespace Database\Factories;

use App\Enums\InvoiceType;
use App\Enums\UnitType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomSubMonth = rand(0, 6);

        $time = $randomSubMonth == 0
            ? now()
            : now()->subMonths($randomSubMonth);
        
        return [
            'user_id' => User::first()->id,
            'to' => $this->faker->name,
            'base_price' => $this->faker->numberBetween(800000, 10000000),
            'amount' => $this->faker->numberBetween(1, 10),
            'unit' => UnitType::randomCase(),
            'type' => InvoiceType::randomCase(),
            'transaction_date' => $time,
        ];
    }
}
