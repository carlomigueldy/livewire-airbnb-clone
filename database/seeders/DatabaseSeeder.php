<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator;
use Illuminate\Container\Container;

class DatabaseSeeder extends Seeder
{
    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker()
    {
        return Container::getInstance()->make(Generator::class);
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Carlo Miguel Dy',
            'email' => 'dev@dev.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ]);
        \App\Models\User::factory(5)->create();
        \App\Models\Room::factory(10)->create();
        $reservations = \App\Models\Reservation::factory(25)->create();

        foreach ($reservations as $reservation) {
            $ratings = collect([1.0, 1.5, 2.0, 2.5, 3.0, 3.5, 4.0, 4.5, 5.0]);

            $reservation->review()->create([
                'reservation_id' => $reservation->id,
                'rating' => $ratings->random(),
                'comment' => $this->faker->realText(64),
            ]);
        }

        // \App\Models\Review::factory(5000)->create();
    }
}
