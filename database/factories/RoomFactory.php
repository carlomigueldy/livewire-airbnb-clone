<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Room::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $homeTypes = collect([
            'Entire place',
            'Private room',
            'Hotel room',
            'Unique stays',
            'Superhosts',
            'Shared room'
        ]);
        $roomTypes = collect([
            'Single',
            'Double',
            'Triple',
            'Quad',
            'King',
            'Queen',
            'Twin',
            'Double-double',
            'Studio'
        ]);
        $boolean = collect([true, false]);

        return [
            'owner_id' => User::pluck('id')->random(),
            'home_type' => $homeTypes->random(),
            'room_type' => $roomTypes->random(),
            'total_occupancy' => $this->faker->numberBetween(1, 10),
            'total_bedrooms' => $this->faker->numberBetween(1, 5),
            'total_bathrooms' => $this->faker->numberBetween(1, 4),
            'summary' => null,
            'address' => $this->faker->address,
            'has_tv' => $boolean->random(),
            'has_kitchen' => $boolean->random(),
            'has_air_con' => $boolean->random(),
            'has_heathing' => $boolean->random(),
            'price' => $this->faker->randomFloat(2, 100, 1500),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'published_at' => $this->faker->date('Y-m-d'),
        ];
    }
}
