<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert(
            [
                "name" =>  "Nguyen Huu Khuong", 
                "image" => 'img',
                "email" => "nguyenhuukhuong27102000@gmail.com",
                "gender" => "1", 
                "day_of_birth" => "2000/10/27",  
                "address" => "Trieu Phong, Quang Tri",  
                "phone" => "0947964559", 
                'password' => bcrypt('123456'),
            ]
            );
        Customer::factory(10)->create();
    }
}