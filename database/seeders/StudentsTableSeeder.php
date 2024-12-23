<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Student_new')->insert([
            ['name' => 'Ali', 'age' => 20, 'email' => 'ali@gmail.com'],
            ['name' => 'Ahmed', 'age' => 21, 'email' => 'ahmed@gmail.com'],
            ['name' => 'Omar', 'email' => 'omar@example.com', 'age' => 19],

        ]);
    }
}
