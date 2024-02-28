<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            "Edgar",
            "Ruben",
            "David",
        ];

        $teachersApellidos = [
            "L",
            "N",
            "R",
        ];

        foreach ($teachers as $teacher) {
            Teacher::create(['name' => $teacher]);
        }

        foreach ($teachersApellidos as $teacherApellido) {
            Teacher::create(['surname' => $teacherApellido]);
        }
    }
}
