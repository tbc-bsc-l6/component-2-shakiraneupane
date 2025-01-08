<?php
// database/factories/OrderFactory.php
namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,  // Get a random user ID
            'shipping_address' => $this->faker->address(),
            'total_amount' => $this->faker->randomFloat(2, 20, 500),  // Random total between 20 and 500
            'status' => $this->faker->randomElement(['pending', 'shipped', 'delivered']),
        ];
    }


}
