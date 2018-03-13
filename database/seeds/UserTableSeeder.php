<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::where('name', 'admin')->get();
        $roleManager = Role::where('name', 'project_manager')->get();
        $roleMember = Role::where('name', 'project_member')->get();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@vao.pl';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->assignRole($roleAdmin);

        $projectManager = new User();
        $projectManager->name = 'Jacek Manager';
        $projectManager->email = 'jacekmanager@vao.pl';
        $projectManager->password = bcrypt('jacekmanager');
        $projectManager->save();
        $projectManager->assignRole($roleManager);

        $memberKuba = new User();
        $memberKuba->name = 'Kuba Członek';
        $memberKuba->email = 'kubaczlonek@vao.pl';
        $memberKuba->password = bcrypt('kubaczlonek');
        $memberKuba->save();
        $memberKuba->assignRole($roleMember);

        $memberFilip = new User();
        $memberFilip->name = 'Filip Członek';
        $memberFilip->email = 'filipczlonek@vao.pl';
        $memberFilip->password = bcrypt('filipczlonek');
        $memberFilip->save();
        $memberFilip->assignRole($roleMember);

        $memberAndrzej = new User();
        $memberAndrzej->name = 'Andrzej Członek';
        $memberAndrzej->email = 'andrzejczlonek@vao.pl';
        $memberAndrzej->password = bcrypt('andrzejczlonek');
        $memberAndrzej->save();
        $memberAndrzej->assignRole($roleMember);
    }
}
