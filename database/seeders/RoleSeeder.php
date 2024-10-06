<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        

        Permission::create(['name' => 'adminProducts']);

        Permission::create(['name' => 'adminCategories']);

        $role1->givePermissionTo('adminProducts');
        $role1->givePermissionTo('adminCategories');
       
        
    }
}
