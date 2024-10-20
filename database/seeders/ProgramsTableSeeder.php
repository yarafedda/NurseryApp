<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'name' => 'Art and Craft',
                'description' => 'Engage in creative activities like drawing and painting.',
                'duration' => '2 hours',
                'image' => 'images/programs/art.PNG', 
                'staff_id'=>'1',
            ],
            [
                'name' => 'Music Lessons',
                'description' => 'Learn musical instruments and vocal training.',
                'duration' => '1 hour',
                'image' => 'images/programs/music.PNG', 
                'staff_id'=>'1',
            ],
            [
                'name' => 'Physical Education',
                'description' => 'Participate in various sports and physical exercises.',
                'duration' => '1.5 hours',
                'image' => 'images/programs/sport.PNG', 
                'staff_id'=>'2',
            ],
            [
                'name' => 'Dance Classes',
                'description' => 'Learn different styles of dance and improve coordination.',
                'duration' => '1 hour',
                'image' => 'images/programs/dancing.PNG', 
                'staff_id'=>'2',
            ],
            [
                'name' => 'Science Experiments',
                'description' => 'Engage in fun and educational science experiments.',
                'duration' => '1.5 hours',
                'image' => 'images/programs/science.PNG', 
                'staff_id'=>'3',
            ],
            [
                'name' => 'Storytelling and Reading',
                'description' => 'Enhance literacy skills through storytelling and reading sessions.',
                'duration' => '1 hour',
                'image' => 'images/programs/reading.PNG', 
                'staff_id'=>'3',
            ],
        ]);
    }

    }

