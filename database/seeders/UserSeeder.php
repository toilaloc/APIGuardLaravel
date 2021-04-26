<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakeDateOfBirth = '12-12-1992';
        $getDateOfBirth = Carbon::parse($fakeDateOfBirth);
        for ($i = 1; $i < 20; $i++) {
            User::create([
                'name' => "User {$i}",
                'email' => "user{$i}@gmail.com",
                'password' => Hash::make("123456"),
                'full_name' => "Michale {$i}",
                'date_of_birth' => $getDateOfBirth,
                'address' => "Danang, Vietnam",
                'organization_id' => rand(1,19)
            ]);
        }
    }
}
