<?php

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeed extends Seeder
{
    /**
     * 
     */
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = App\User::create([
        	'name'        => 'Admin',
        	'email'	      =>	'admin@a.com',
        	'password'	  =>	bcrypt('secret')
        ]);

        $user2 = App\User::create([
            'name'         => 'Customer',
            'email'        =>  'customer@a.com',
            'password'     =>  bcrypt('secret')
        ]);

        $role1 = App\Role::create([
            'name'         => 'Admin',
            'description'  => 'Admin'
        ]);

        $role2 = App\Role::create([
            'name'         => 'Customer',
            'description'  => 'Customer'
        ]);

        $permission1 = App\Permission::create([
            'name'         => 'manage',
            'description'  => 'manage'
        ]);

        $permission2 = App\Permission::create([
        	'name'         => 'order',
        	'description'  => 'order'
        ]);

        $role1->givePermissionTo($permission1);
        $role2->givePermissionTo($permission2);

        $user1->actAs($role1);
        $user2->actAs($role2);
    }
}
