<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact; // Make sure this import is here
use App\Models\User;
use App\Models\Order;



class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed 10 contact entries
        Contact::factory(10)->create(); //Creates 10 contacts

       // Seed 30 users
       User::factory(35)->create();  // This creates 30 user records

       // Seed 30 orders, each associated with a random user
       Order::factory(35)->create();  // This creates 30 orders, each linked to a random user


    }
}
