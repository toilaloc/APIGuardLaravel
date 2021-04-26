<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionName = [
            ["add_user"],
            ["edit_user"],
            ["delete_user"],
            ["add_organization"],
            ["edit_organization"],
            ["delete_organization"],
            ["add_post"],
            ["edit_post"],
            ["delete_post"]
        ];
        $lengthpermissionName = count($permissionName);
        for ($i = 0; $i < $lengthpermissionName; $i++) {
            Permission::create([
                "name" => $permissionName[$i][0]
            ]);
        }
    }
}
