<?php

namespace Database\Factories;
use App\Models\TreatmentRecord;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TreatmentRecord>
 */
class TreatmentRecordFactory extends Factory
{
    protected $model = TreatmentRecord::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => Patient::factory(),
            'doctor_id' => Doctor::factory(),
            'treatment_details' => $this->faker->paragraph,
            'treatment_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
