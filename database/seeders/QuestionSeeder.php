<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        Question::create([
            'question' => 'How many apples are there?',
            'option_a' => '1',
            'option_b' => '2',
            'option_c' => '3',
            'option_d' => '4',
            'correct_answer' => '3',
            'image' => null,
        ]);

        Question::create([
            'question' => 'Which animal says Meow?',
            'option_a' => 'Dog',
            'option_b' => 'Cat',
            'option_c' => 'Cow',
            'option_d' => 'Lion',
            'correct_answer' => 'Cat',
            'image' => null,
        ]);

        Question::create([
            'question' => 'What color is the sun?',
            'option_a' => 'Red',
            'option_b' => 'Blue',
            'option_c' => 'Yellow',
            'option_d' => 'Green',
            'correct_answer' => 'Yellow',
            'image' => null,
        ]);

        Question::create([
            'question' => 'What comes after 5?',
            'option_a' => '4',
            'option_b' => '5',
            'option_c' => '6',
            'option_d' => '7',
            'correct_answer' => '6',
            'image' => null,
        ]);

        Question::create([
            'question' => 'Which one is a fruit?',
            'option_a' => 'Car',
            'option_b' => 'Apple',
            'option_c' => 'Chair',
            'option_d' => 'Ball',
            'correct_answer' => 'Apple',
            'image' => null,
        ]);
    }
}