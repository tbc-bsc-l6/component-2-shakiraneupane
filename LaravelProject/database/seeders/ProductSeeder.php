<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Adding products with image URLs (relative paths to the public folder)
        Book::create([
            'title' => 'Wild Himalaya',
            'author' => 'Stephen Alter',
            'price' => 200,
            'genre' => 'Arts & Photography',
            'description' => 'Exploration of Himalayas beauty, biodiversity, culture, history, and fragility.',
            'image_url' => 'images/arts1.jpg'

        ]);

        Book::create([
            'title' => 'The History of Ancient World',
            'author' => 'Susan Wise Bauer',
            'price' => 300,
            'genre' => 'History & Biography',
            'description' => 'Comprehensive journey through ancient civilizations, cultures, and historical events.',
            'image_url' => 'images/history1.jpg'

        ]);

        Book::create([
            'title' => 'Good Health in the 21st Century',
            'author' => 'Dr Carole HungerFord',
            'price' => 250,
            'genre' => 'Lifestyle & Wellness',
            'description' => 'Insights into modern health, nutrition, lifestyle, and preventive medicine.',
            'image_url' => 'images/wellness1.jpg'

        ]);

        Book::create([
            'title' => 'Diary of a Wimpy Kid',
            'author' => 'Stephen Alter',
            'price' => 150,
            'genre' => 'Kids & Teens',
            'description' => 'Humorous stories of a middle schoolers daily challenges and adventures.',
            'image_url' => 'images/kids1.jpg'

        ]);

        Book::create([
            'title' => 'To kill a MockingBird',
            'author' => 'Stephen Alter',
            'price' => 350,
            'genre' => 'Fiction & Literature',
            'description' => 'Explores racial injustice, moral growth, and the loss of innocence',
            'image_url' => 'images/literature1.jpg'

        ]);


        Book::create([
            'title' => 'Art & Illusion',
            'author' => 'E.H Gombrich',
            'price' => 300,
            'genre' => 'Arts & Photography',
            'description' => 'Explores visual perception, art history, and the relationship between illusion',
            'image_url' => 'images/art2.jpg'

        ]);


        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'price' => 300,
            'genre' => 'Lifestyle & Wellness',
            'description' => 'This Book focuses on building positive habits effectively',
            'image_url' => 'images/lifestyle2.jpg'

        ]);

        Book::create([
            'title' => 'The Hunger Games',
            'author' => 'Suzzane Collins',
            'price' => 400,
            'genre' => 'Kids & Teens',
            'description' => 'Post-apocalyptic novel about survival, rebellion, and societal control',
            'image_url' => 'images/teens2.jpg'

        ]);

        Book::create([
            'title' => 'Clear',
            'author' => 'Carys Davies',
            'price' => 400,
            'genre' => 'History & Biography',
            'description' => 'Novel exploring grief, personal discovery, and the complexities of human relationships',
            'image_url' => 'images/history2.jpg'

        ]);


        Book::create([
            'title' => 'PlayGround',
            'author' => 'Richard Powers',
            'price' => 500,
            'genre' => 'Fiction & Literature',
            'description' => 'This book explores human connections, technology, and nature.',
            'image_url' => 'images/fiction2.jpg'

        ]);



        Book::create([
            'title' => 'Steal Like an Artist',
            'author' => 'Austin Kleon',
            'price' => 600,
            'genre' => 'Arts & Photography',
            'description' => 'This book inspires creativity through influence, transformation, and experimentation.',
            'image_url' => 'images/arts3.jpg'

        ]);

        Book::create([
            'title' => 'The Stranger',
            'author' => 'Harlan Cobens',
            'price' => 800,
            'genre' => 'Fiction & Literature',
            'description' => 'This book unravels dark secrets, deception, and unexpected twists in thriller.',
            'image_url' => 'images/fiction3.jpg'

        ]);

        Book::create([
            'title' => 'Good Energy',
            'author' => 'Casey Means',
            'price' => 900,
            'genre' => 'Lifestyle & Wellness',
            'description' => 'This Book promotes wellness through mindful living, nutrition, and sustainable habits.',
            'image_url' => 'images/wellness3.jpg'

        ]);

        Book::create([
            'title' => 'A Promised Land',
            'author' => 'Barack Obama',
            'price' => 350,
            'genre' => 'History & Biography',
            'description' => 'Barack Obamas memoir reflects his presidency, challenges, and personal political journey.',
            'image_url' => 'images/biography3.jpg'

        ]);

        Book::create([
            'title' => 'Harry Potter',
            'author' => 'J.K Rowling',
            'price' => 550,
            'genre' => 'Kids & Teens',
            'description' => 'Harry Potter discovers magic, friendship, and his destiny to defeat Voldemort',
            'image_url' => 'images/teens3.jpg'

        ]);

    }
}
