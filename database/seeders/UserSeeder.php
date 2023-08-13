<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                "name" =>  "Nguyen Huu Khuong", 
                "image" => 'img',
                "email" => "nguyenhuukhuong27102000@gmail.com",
                "gender" => "1", 
                "day_of_birth" => "2000/10/27",  
                "group_id" => "1",  
                "address" => "Trieu Phong, Quang Tri",  
                "phone" => "0947964559", 
                'password' => bcrypt('123456'),
            ]
        );
        User::factory(10)->create();
    }
}