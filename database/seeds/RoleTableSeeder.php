<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'admin';
        $admin->description = 'Administrator';
        $admin->save();

        $projectManager = new Role();
        $projectManager->name = 'project_manager';
        $projectManager->description = 'Project Manager/Team Leader';
        $projectManager->save();

        $member = new Role();
        $member->name = 'member';
        $member->description = 'Member of project';
        $member->save();
    }
}
