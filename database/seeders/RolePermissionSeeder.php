<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    CONST ROLE_ADMIN = 1;
    CONST ROLE_ORGNAIZATION_ADMIN = 2;
    CONST ROLE_WRITER = 3;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $getAllRole = Role::all();
//        $lengthAllRole = $getAllRole->count();
//        foreach ($getAllRole as $eachRole) {
//            if ($eachRole->id === self::ROLE_ADMIN) {
//                for ($i = 1; $i < $lengthAllRole; $i++) {
//                    RolePermission::create([
//                        "role_id" => $eachRole->id,
//                        "permission_id" => $i
//                    ]);
//                }
//
//            }
//        }
    }
}
