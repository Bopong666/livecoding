<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**     * Run the database seeds.
     */
    public function run(): void
    {
        // admin
        $jumlahAdmin = 2;

        for($i = 1; $i < $jumlahAdmin; $i++){
            $admin = User::factory()->create([
                        'name' => "admin{$i}",
                        'email' => "admin{$i}@gmail.com",
                        'password' => Hash::make('admin123'),
                    ]);
            Profile::factory()->create([
                'user_id' => $admin->id,
                'role' => 'admin',
            ]);
        }

        $jumlahUser = 5;

        for($i = 1; $i < $jumlahUser; $i++){
            $user = User::factory()->create([
                        'name' => "user{$i}",
                        'email' => "user{$i}@gmail.com",
                        'password' => Hash::make('user123'),
                    ]);
            Profile::factory()->create([
                'user_id' => $user->id,
                'role' => 'user',
            ]);
        }
       
    }
}
