<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hotel.com'],
            [
                'name' => 'Hotel Admin',
                'email' => 'admin@hotel.com',
                'password' => Hash::make('admin123'),
            ]
        );

        $this->command->info('✅ Admin created — Email: admin@hotel.com / Password: admin123');
    }
}
