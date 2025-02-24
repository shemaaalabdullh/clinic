<?php

namespace Database\Factories;
use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    protected $model = Expense::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'expense_type' => $this->faker->randomElement(['Rent', 'Equipment', 'Supplies']),
            'amount' => $this->faker->randomFloat(2, 50, 5000),
            'date' => $this->faker->date(),
            'description' => $this->faker->sentence,
        ];
    }
}
