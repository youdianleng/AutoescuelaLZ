<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'post-list',
            'post-create',
            'post-edit',
            'post-all',
            'post-delete',
            'exercise-list',
            'exercise-create',
            'exercise-edit',
            'exercise-all',
            'exercise-delete',
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
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

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
