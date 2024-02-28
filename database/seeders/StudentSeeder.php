<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use ./
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            "david",
            "zhiou",
            "laia",
        ];

        $studentsApellidos = [
            "A",
            "B",
            "C",
        ];

        foreach ($students as $student) {
            Student::create(['name' => $student]);
        }
    }
    



}
