<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\OrderDetailSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\GroupRoleSeeder;
use App\Models\Group;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
        // $this->call(OrderSeeder::class);
        // $this->call(OrderDetailSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GroupRoleSeeder::class);
    }
    }