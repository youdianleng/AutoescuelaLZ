<?php

namespace Database\Seeders;

use App\Models\Teacher;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $teacherNew = Teacher::create([
        "name" => 'David',
        "surname" => 'Herrera'
       ]
        
       );
    }
}
