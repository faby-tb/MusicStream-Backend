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
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Admin Role';
        $role->save();

        $role = new Role();
        $role->name = 'moderador';
        $role->description = 'Moderador Role';
        $role->save();

        $role = new Role();
        $role->name = 'user';
        $role->description = 'User Role';
        $role->save();
    }
}
