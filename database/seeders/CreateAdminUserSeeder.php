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
            'test-delete'
        ];
        $roleTeacher->syncPermissions($permissionsTeacher);

        $teacher = User::create([
            'name' => 'Teacher',
            'surname' => '1',
            'email' => 'teacher@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $teacher->assignRole([$roleTeacher->id]);

        $student = User::create([
            'name' => 'Student',
            'surname' => '1',
            'email' => 'student@gmail.com',
            'password' => bcrypt('12345678'),
            'teacher_id' => $teacher->id
        ]);
        $student->assignRole([$roleStudent->id]);
    }
}
