<?php

namespace Database\Factories\Residents;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Residents\ResidentRecord;

use Str;
use Carbon\Carbon;

class ResidentRecordFactory extends Factory
{
    protected $model = ResidentRecord::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ref_code' => 'RSDNT-'.strtoupper(Str::random(10)),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->safeEmail,
            'mobile_number' => $this->faker->phoneNumber,
            'landline' => $this->faker->tollFreePhoneNumber,
            'birthdate' => Carbon::now(),
            'region' => 'NCR',
            'city' => 'Makati',
            'barangay' => 'Pitogo',
            'address_line1' => $this->faker->streetAddress,
        ];
    }
}
