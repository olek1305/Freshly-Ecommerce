<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert main categories
        DB::table('categories')->insert([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'icon' => 'fab fa-500px',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Fashion',
            'slug' => 'fashion',
            'icon' => 'fas fa-tshirt',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Health & Beauty',
            'slug' => 'health-beauty',
            'icon' => 'fas fa-spa',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Home & Garden',
            'slug' => 'home-garden',
            'icon' => 'fas fa-couch',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Sports & Recreation',
            'slug' => 'sports-recreation',
            'icon' => 'fas fa-football-ball',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('categories')->insert([
            'name' => 'Books & Media',
            'slug' => 'books-media',
            'icon' => 'fas fa-book',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
