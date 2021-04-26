<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleName = [
            ["admin"],
            ["organization_admin"],
            ["writer"]
        ];
        $lengthroleName = count($roleName);
        for ($i = 0; $i < $lengthroleName; $i++) {
            Role::create([
               "name" => $roleName[$i][0]
            ]);
        }
    }
}
