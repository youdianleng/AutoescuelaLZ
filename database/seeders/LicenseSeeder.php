<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\License;

class LicenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $licenses = [
            "A1",
            "B",
            "C",
        ];

        $licensesDescription = [
            "Moto",
            "Coche",
            "Camión"
        ];
        
        foreach ($licenses as $license) {
            License::create(['type' => $license]);
        }

        foreach ($licensesDescription as $licenseDescription) {
            License::create(['description' => $licenseDescription]);
        }
    }
}
