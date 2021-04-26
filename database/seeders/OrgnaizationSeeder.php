<?php

namespace Database\Seeders;

use App\Models\Orgnaization;
use Illuminate\Database\Seeder;

class OrgnaizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            Orgnaization::create([
                'id' => $i,
                'name' => "Orgnaization {$i}",
                'email' => "ogr{$i}@gmail.com",
                'address' => "Danang, Vietnam",
                'phone' => "0987654321"
            ]);
        }
    }
}
