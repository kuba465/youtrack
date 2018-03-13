<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $admin->save();

        $projectManager = Role::create(['name' => 'project_manager']);
        $projectManager->save();

        $member = Role::create(['name' => 'project_member']);
        $member->save();
    }
}
