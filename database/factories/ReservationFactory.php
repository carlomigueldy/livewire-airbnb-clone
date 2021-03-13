<?php

namespace Database\Factories;

use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->randomFloat(2, 100, 2500);

        return [
            'user_id' => User::pluck('id')->random(),
            'room_id' => Room::pluck('id')->random(),
            'start_date' => $this->faker->dateTimeBetween('-5 month', '-3 month'),
            'end_date' => $this->faker->dateTimeBetween('-2 month', 'now'),
            'price' => $price,
            'total' => $price,
        ];
    }
}
