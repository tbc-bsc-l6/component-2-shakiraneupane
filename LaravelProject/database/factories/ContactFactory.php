<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    // Specify the model that the factory is for
    protected $model = Contact::class;

    // Define the state of the model
    public function definition()
    {
        return [
            'name' => $this->faker->name,                 // Fake name
            'email' => $this->faker->unique()->safeEmail, // Fake email (unique)
            'message' => $this->faker->paragraph,         // Fake message (paragraph)
        ];
    }
}
