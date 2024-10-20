<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staffs')->insert([
            [
                'firstname' => 'sarah',
                'lastname' => 'Johnson',
                'position' => 'Art and Music Teacher',
                'qualification' => 'Bachelor of Fine Arts',
                'date_hired' => Carbon::parse('2022-01-15'),
                'image' => 'images/staffs/art-staff.PNG' 
            ],
            [
                'firstname' => 'james',
                'lastname' => 'Miller',
                'position' => 'Physical Education and Dance Teacher',
                'qualification' => 'Master of Physical Education',
                'date_hired' => Carbon::parse('2021-09-01'),
                'image' => 'images/staffs/sport-staff.PNG'
            ],
            [
                'firstname' => 'Emily',
                'lastname' => 'Davis',
                'position' => 'Science and Storytelling Teacher',
                'qualification' => ' Master of Child Development',
                'date_hired' => Carbon::parse('2020-05-20'),
                'image' => 'images/staffs/science-staff.PNG'
            ],
        ]);
    }
    
}
