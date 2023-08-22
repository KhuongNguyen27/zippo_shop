<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        // Role::truncate();
        $table = ['Category','Product','Customer','Order','Orderdetail','Group','User'];
        $action = ['viewAny','view','create','update','viewTrash','delete','restore','forceDelete','export'];
        foreach ($table as $name) {
            foreach ($action as $active) {
                DB::table('roles')->insert(
                    [
                        "name" =>  $name.'_'.$active, 
                        "group_name" => $name 
                    ]
                );
            }
        }
        $permission = new Role();
        $permission->name = "Group_Permission";
        $permission->group_name = "Group";
        $permission->save();
    }
}