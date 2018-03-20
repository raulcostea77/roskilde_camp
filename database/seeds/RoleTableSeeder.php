<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_masturbator = new Role();
        $role_masturbator->name = 'masturbator';
        $role_masturbator->description = 'A normal user';
        $role_masturbator->save();

        $role_pimp = new Role();
        $role_pimp->name = 'pimp';
        $role_pimp->description = 'A god of love';
        $role_pimp->save();
    }
}
