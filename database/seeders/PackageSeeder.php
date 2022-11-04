<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Package::create([
            'name' => 'admin',
            'description' => 'Package',
            'amount' => '20000',
            'status' => 1,
            'image' => 'admin@admin.com',
        ]);
    }
}
