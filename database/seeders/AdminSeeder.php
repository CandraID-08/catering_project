<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'cateringdapuribu12@gmail.com'],
            [
                'name' => 'Admin Dapur Ibu',
                'password' => Hash::make('AdminDapurIbu123'),
            ]
        );
    }
}
