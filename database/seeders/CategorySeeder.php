<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();
        $names =[
            'Zippo Zodiac Animal',
            'Zippo Armor',
            'Zippo Sterling Silver',
            'Zippo Limited',
            'Zippo Axit',
            'Zippo Replica',
            'Zippo Slim',
            'Zippo Korea',
            'Zippo Japan',
            'Zippo Classics'
        ];
        foreach ($names as $name) {
            DB::table('categories')->insert(
                [
                    "name" =>  $name, 
                    "image" => "img", 
                ]
            );
        }
    }
}