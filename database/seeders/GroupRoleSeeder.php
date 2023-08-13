<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Group_Role;

class GroupRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    for ($i=1; $i <= 64; $i++) { 
        DB::table('group_role')->insert(
            [
                "group_id" => 1, 
                "role_id" => $i 
                ]
            );
        }
    }
}