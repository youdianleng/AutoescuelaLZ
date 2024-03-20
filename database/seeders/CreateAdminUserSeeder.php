<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleTeacher = Role::create(['name' => 'teacher']);
        $roleStudent = Role::create(['name' => 'student']);

        $permissionsTeacher = [
            'student-list',
            'student-create',
            'student-edit',
            'student-delete',
            'test-list',
            'test-create',
            'test-edit',
            'test-delete',
            'question-create',
            'question-edit',
            'question-delete',
            'option-create',
            'option-edit',
            'option-delete'
        ];
        $roleTeacher->syncPermissions($permissionsTeacher);

        $teacher = User::create([
            'name' => 'Teacher',
            'surname' => 'Surname',
            'email' => 'teacher@gmail.com',
            'address' => 'Carrer Major',
            'password' => bcrypt('12345678')
        ]);
        $teacher->assignRole([$roleTeacher->id]);

        $student = User::create([
            'name' => 'Jane',
            'surname' => 'Doe',
            'email' => 'student@gmail.com',
            'address' => 'Carrer Magallanes',
            'password' => bcrypt('12345678'),
            'teacher_id' => $teacher->id
        ]);

        $student = User::create([
            'name' => 'Laia',
            'surname' => 'Vizcarro',
            'email' => 'laia@gmail.com',
            'address' => 'Carrer Nou',
            'password' => bcrypt('12345'),
            'teacher_id' => $teacher->id
            // license_id FALTA
        ]);
        
        $student->assignRole([$roleStudent->id]);

    }
}
