<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::find(1);
        $projectManager = Role::find(2);
        $projectMember = Role::find(3);

        $permission = Permission::create(['name' => 'add.roles.and.permissions']);
        $permission->save();
        $admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'add.members.to.project']);
        $permission->save();
        $admin->givePermissionTo($permission);
        $projectManager->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'add.issue.to.project']);
        $permission->save();
        $admin->givePermissionTo($permission);
        $projectManager->givePermissionTo($permission);
        $projectMember->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'add.project']);
        $permission->save();
        $admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'edit.project']);
        $permission->save();
        $admin->givePermissionTo($permission);
        $projectManager->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'delete.project']);
        $permission->save();
        $admin->givePermissionTo($permission);

        $permission = Permission::create(['name' => 'show.project']);
        $permission->save();
        $admin->givePermissionTo($permission);
        $projectManager->givePermissionTo($permission);
        $projectMember->givePermissionTo($permission);
    }
}
