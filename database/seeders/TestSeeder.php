<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $test = Test::create([
            'level' => 'Baja',
        ]);

        $test1 = Test::create([
            'level' => 'Normal',
        ]);

        $test2 = Test::create([
            'level' => 'Alta',
        ]);
    }
}
