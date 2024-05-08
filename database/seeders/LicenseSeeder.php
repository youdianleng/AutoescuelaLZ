<?php

namespace Database\Seeders;

use App\Models\License;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Licensia = License::create([
            "type" => "Coche",
            "description" => "This is an Car license",
        ]);
    }
}
