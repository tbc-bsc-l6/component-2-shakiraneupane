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
            'description' => 'An enthralling exploration of the majestic Himalayan range, this book celebrates the natural wonders of the Himalayas. It vividly captures the extraordinary biodiversity, breathtaking landscapes, and unique ecosystems while shedding light on the cultural heritage and historical significance of the region. With compelling narratives, it offers insights into the lives of the people and wildlife that coexist within this fragile yet awe-inspiring environment, making it a must-read for adventurers, nature lovers, and cultural enthusiasts alike',
            'image_url' => 'images/arts1.jpg'

        ]);

        Book::create([
            'title' => 'The History of Ancient World',
            'author' => 'Susan Wise Bauer',
            'price' => 300,
            'genre' => 'History & Biography',
            'description' => 'A captivating narrative that chronicles the fascinating history of the ancient world, this book by Susan Wise Bauer delves into the rise and fall of civilizations from the dawn of humanity to the collapse of Rome. It vividly brings to life the political, cultural, and social intricacies of empires such as Mesopotamia, Egypt, Greece, and Rome. With engaging storytelling and insightful analysis, it explores the interplay of historical events, key figures, and transformative ideas that shaped the course of human history. This book is a must-read for history enthusiasts eager to understand the origins of the modern world and the enduring legacy of ancient societies.',
            'image_url' => 'images/history1.jpg'

        ]);

        Book::create([
            'title' => 'Good Health in the 21st Century',
            'author' => 'Dr Carole HungerFord',
            'price' => 250,
            'genre' => 'Lifestyle & Wellness',
            'description' => 'In Good Health in the 21st Century, Dr. Carole Hungerford offers a compelling exploration of how modern lifestyles and environmental factors influence our health. Drawing from cutting-edge research and decades of medical expertise, the book delves into the root causes of common illnesses and provides practical, science-backed strategies for prevention and healing. From understanding the impact of nutrition and genetics to addressing stress and toxins, this guide empowers readers to take control of their well-being in todays fast-paced world. A valuable resource for anyone seeking to achieve lasting health and vitality.',
            'image_url' => 'images/wellness1.jpg'

        ]);

        Book::create([
            'title' => 'Diary of a Wimpy Kid',
            'author' => 'Stephen Alter',
            'price' => 150,
            'genre' => 'Kids & Teens',
            'description' => 'Diary of a Wimpy Kid is a hilarious and relatable story about the trials and tribulations of middle school life, told through the eyes of Greg Heffley, a self-proclaimed underdog. Packed with laugh-out-loud moments, quirky illustrations, and clever commentary, the book captures the awkwardness of growing up, navigating friendships, dealing with family, and surviving school. Jeff Kinneys bestselling novel is a must-read for kids and adults alike, offering timeless humor and valuable life lessons.',
            'image_url' => 'images/kids1.jpg'

        ]);

        Book::create([
            'title' => 'To kill a MockingBird',
            'author' => 'Stephen Alter',
            'price' => 350,
            'genre' => 'Fiction & Literature',
            'description' => 'Set in the racially charged South during the 1930s, To Kill a Mockingbird by Harper Lee is a timeless classic that explores themes of justice, morality, and human empathy. Through the eyes of young Scout Finch, the story unfolds as her father, Atticus Finch, defends a Black man falsely accused of a grave crime. With unforgettable characters and profound social commentary, the novel masterfully highlights the prejudices of the time while imparting lessons about courage, compassion, and standing up for what is right. A cornerstone of American literature, this book continues to inspire readers of all generations.',
            'image_url' => 'images/literature1.jpg'

        ]);


        Book::create([
            'title' => 'Art & Illusion',
            'author' => 'E.H Gombrich',
            'price' => 300,
            'genre' => 'Arts & Photography',
            'description' => 'Art & Illusion by E.H. Gombrich is a groundbreaking exploration of the psychology of perception and its profound connection to the world of art. In this seminal work, Gombrich delves into the ways artists throughout history have used techniques, visual cues, and creative imagination to represent reality and evoke emotion. By blending art history, science, and philosophy, the book offers a deep understanding of how artistic styles evolve and how viewers interpret images. A masterful analysis of visual art and its illusions, this book remains an essential read for art enthusiasts, historians, and anyone curious about the creative process.',
            'image_url' => 'images/art2.jpg'

        ]);


        Book::create([
            'title' => 'Atomic Habits',
            'author' => 'James Clear',
            'price' => 300,
            'genre' => 'Lifestyle & Wellness',
            'description' => 'Atomic Habits by James Clear is a transformative guide to building good habits, breaking bad ones, and unlocking your full potential. With practical strategies rooted in psychology and behavioral science, Clear explains how small, consistent changes can lead to remarkable results over time. The book provides actionable insights on how to design your environment for success, stay motivated, and overcome setbacks. Packed with inspiring stories and proven techniques, Atomic Habits is an essential read for anyone looking to improve their life, achieve goals, and make lasting changes one small habit at a time.',
            'image_url' => 'images/lifestyle2.jpg'

        ]);

        Book::create([
            'title' => 'The Hunger Games',
            'author' => 'Suzzane Collins',
            'price' => 300,
            'genre' => 'Kids & Teens',
            'description' => 'The Hunger Games by Suzanne Collins is a gripping dystopian novel set in the post-apocalyptic nation of Panem, where the Capitol exerts its control by forcing each of its twelve districts to send a boy and girl to compete in a brutal, televised fight to the death. The story follows Katniss Everdeen, a courageous and resourceful teenager who volunteers in place of her younger sister. As Katniss navigates the deadly arena, she faces harrowing challenges, forms unexpected alliances, and sparks a rebellion that challenges the oppressive regime. With its intense action, emotional depth, and thought-provoking themes of survival, sacrifice, and social inequality, The Hunger Games is a modern classic that has captivated readers worldwide.',
            'image_url' => 'images/teens2.jpg'

        ]);

        Book::create([
            'title' => 'Clear',
            'author' => 'Carys Davies',
            'price' => 400,
            'genre' => 'History & Biography',
            'description' => 'Clear by Carys Davies is a beautifully crafted exploration of human relationships, resilience, and the quest for meaning. With her signature lyrical prose and keen insight into the human condition, Davies weaves a captivating narrative that delves into themes of longing, hope, and the complexities of personal transformation. This thought-provoking work invites readers to reflect on the paths we choose and the clarity we seek in a world often clouded by uncertainty. A masterful tale, Clear is an unforgettable journey through the intricacies of the human spirit.',
            'image_url' => 'images/history2.jpg'

        ]);


        Book::create([
            'title' => 'PlayGround',
            'author' => 'Richard Powers',
            'price' => 500,
            'genre' => 'Fiction & Literature',
            'description' => 'Playground by Richard Powers is an evocative exploration of childhood, imagination, and the profound connections that shape our lives. With his trademark storytelling brilliance, Powers takes readers on a journey through the unfiltered world of children as they navigate joy, wonder, and the challenges of growing up. Richly layered with emotional depth and thought-provoking insights, the book delves into the delicate balance between innocence and experience, offering a poignant reflection on how play shapes our understanding of the world and ourselves. A heartfelt and beautifully written tale, Playground is a celebration of the human spirit and its boundless creativity.',
            'image_url' => 'images/fiction2.jpg'

        ]);



        Book::create([
            'title' => 'Steal Like an Artist',
            'author' => 'Austin Kleon',
            'price' => 600,
            'genre' => 'Arts & Photography',
            'description' => 'Steal Like an Artist by Austin Kleon is an inspiring and practical guide for anyone looking to unleash their creativity. Packed with insightful advice and simple, actionable ideas, this book encourages readers to embrace influence, remix ideas, and discover their own unique voice. Kleon highlights the importance of curiosity, persistence, and finding inspiration in everyday life. With its engaging illustrations and relatable examples, Steal Like an Artist is a must-read for artists, writers, entrepreneurs, and anyone striving to bring more creativity into their work and life.',
            'image_url' => 'images/arts3.jpg'

        ]);

        Book::create([
            'title' => 'The Stranger',
            'author' => 'Harlan Cobens',
            'price' => 800,
            'genre' => 'Fiction & Literature',
            'description' => 'The Stranger by Harlan Coben is a gripping psychological thriller that will keep readers on the edge of their seats. The story follows Adam Price, an ordinary man whose life is turned upside down when a mysterious stranger reveals a dark secret about his wife, Corinne. As Adam delves deeper into the truth, he finds himself caught in a web of lies, deception, and danger. With Cobens trademark twists and fast-paced narrative, this novel explores the fragility of relationships, the consequences of secrets, and the lengths people will go to protect themselves. A masterclass in suspense, The Stranger is a must-read for fans of thrillers and mysteries.',
            'image_url' => 'images/fiction3.jpg'

        ]);

        Book::create([
            'title' => 'Good Energy',
            'author' => 'Casey Means',
            'price' => 900,
            'genre' => 'Lifestyle & Wellness',
            'description' => 'Good Energy by Casey Means is an insightful guide that explores the power of energy, both physical and mental, in achieving optimal health and well-being. Drawing from the latest scientific research and practical wisdom, Means shows how small, consistent changes in lifestyle and mindset can enhance our vitality, productivity, and emotional balance. With a focus on sustainable energy practices, the book offers actionable tips on nutrition, exercise, sleep, and stress management. Empowering and uplifting, Good Energy is a transformative read for anyone seeking to live with more energy, purpose, and clarity.',
            'image_url' => 'images/wellness3.jpg'

        ]);

        Book::create([
            'title' => 'A Promised Land',
            'author' => 'Barack Obama',
            'price' => 350,
            'genre' => 'History & Biography',
            'description' => 'A Promised Land by Barack Obama is a powerful and eloquent memoir that takes readers on a journey through the former presidents early life, his rise to political prominence, and his time in office. With remarkable insight and honesty, Obama reflects on his personal experiences, the challenges of leadership, and the complexities of American politics. From his historic election to the defining moments of his presidency, the book offers a deep and thought-provoking account of the decisions, triumphs, and struggles that shaped his path. A must-read for those interested in politics, history, and the vision of a better future, A Promised Land is both a memoir of a president and a call to action for the next generation of leaders.',
            'image_url' => 'images/biography3.jpg'

        ]);

        Book::create([
            'title' => 'Harry Potter',
            'author' => 'J.K Rowling',
            'price' => 1100,
            'genre' => 'Kids & Teens',
            'description' => 'Harry Potter by J.K. Rowling is the enchanting and globally beloved series that follows the magical journey of a young wizard, Harry Potter, as he navigates life at Hogwarts School of Witchcraft and Wizardry. Along with his friends, Ron Weasley and Hermione Granger, Harry faces numerous challenges, from battling dark forces to unraveling mysteries that threaten both the magical and non-magical worlds. With unforgettable characters, thrilling adventures, and profound themes of love, friendship, and bravery, the Harry Potter series has captivated readers of all ages and remains a cultural phenomenon. A timeless story of self-discovery and heroism, this series is a must-read for fans of fantasy and adventure.',
            'image_url' => 'images/teens3.jpg'

        ]);

    }
}
