<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChildCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ID category
        $electronicsId = DB::table('categories')->where('slug', 'electronics')->value('id');
        $fashionId = DB::table('categories')->where('slug', 'fashion')->value('id');
        $healthBeautyId = DB::table('categories')->where('slug', 'health-beauty')->value('id');
        $homeGardenId = DB::table('categories')->where('slug', 'home-garden')->value('id');
        $sportsRecreationId = DB::table('categories')->where('slug', 'sports-recreation')->value('id');
        $booksMediaId = DB::table('categories')->where('slug', 'books-media')->value('id');

        // ID subCategory
        $televisionsId = DB::table('sub_categories')->where('slug', 'televisions')->value('id');
        $laptopsId = DB::table('sub_categories')->where('slug', 'laptops')->value('id');
        $womensClothingId = DB::table('sub_categories')->where('slug', 'womens-clothing')->value('id');
        $mensFootwearId = DB::table('sub_categories')->where('slug', 'mens-footwear')->value('id');
        $skincareId = DB::table('sub_categories')->where('slug', 'skincare')->value('id');
        $vitaminsId = DB::table('sub_categories')->where('slug', 'vitamins')->value('id');
        $sofasId = DB::table('sub_categories')->where('slug', 'sofas')->value('id');
        $lawnMowersId = DB::table('sub_categories')->where('slug', 'lawn-mowers')->value('id');
        $treadmillsId = DB::table('sub_categories')->where('slug', 'treadmills')->value('id');
        $surfboardsId = DB::table('sub_categories')->where('slug', 'surfboards')->value('id');
        $fictionId = DB::table('sub_categories')->where('slug', 'fiction')->value('id');
        $blurayId = DB::table('sub_categories')->where('slug', 'blu-ray')->value('id');

        if ($televisionsId) {
            DB::table('child_categories')->insert([
                'category_id' => $electronicsId,
                'sub_category_id' => $televisionsId,
                'name' => 'LED TVs',
                'slug' => 'led-tvs',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($laptopsId) {
            DB::table('child_categories')->insert([
                'category_id' => $electronicsId,
                'sub_category_id' => $laptopsId,
                'name' => 'Gaming Laptops',
                'slug' => 'gaming-laptops',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($womensClothingId) {
            DB::table('child_categories')->insert([
                'category_id' => $fashionId,
                'sub_category_id' => $womensClothingId,
                'name' => 'Dresses',
                'slug' => 'dresses',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($mensFootwearId) {
            DB::table('child_categories')->insert([
                'category_id' => $fashionId,
                'sub_category_id' => $mensFootwearId,
                'name' => 'Sports Shoes',
                'slug' => 'sports-shoes',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($skincareId) {
            DB::table('child_categories')->insert([
                'category_id' => $healthBeautyId,
                'sub_category_id' => $skincareId,
                'name' => 'Skincare',
                'slug' => 'skincare',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($vitaminsId) {
            DB::table('child_categories')->insert([
                'category_id' => $healthBeautyId,
                'sub_category_id' => $vitaminsId,
                'name' => 'Vitamins',
                'slug' => 'vitamins',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($sofasId) {
            DB::table('child_categories')->insert([
                'category_id' => $homeGardenId,
                'sub_category_id' => $sofasId,
                'name' => 'Sofas',
                'slug' => 'sofas',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($lawnMowersId) {
            DB::table('child_categories')->insert([
                'category_id' => $homeGardenId,
                'sub_category_id' => $lawnMowersId,
                'name' => 'Lawn Mowers',
                'slug' => 'lawn-mowers',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($treadmillsId) {
            DB::table('child_categories')->insert([
                'category_id' => $sportsRecreationId,
                'sub_category_id' => $treadmillsId,
                'name' => 'Treadmills',
                'slug' => 'treadmills',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($surfboardsId) {
            DB::table('child_categories')->insert([
                'category_id' => $sportsRecreationId,
                'sub_category_id' => $surfboardsId,
                'name' => 'Surfboards',
                'slug' => 'surfboards',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($fictionId) {
            DB::table('child_categories')->insert([
                'category_id' => $booksMediaId,
                'sub_category_id' => $fictionId,
                'name' => 'Fiction',
                'slug' => 'fiction',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        if ($blurayId) {
            DB::table('child_categories')->insert([
                'category_id' => $booksMediaId,
                'sub_category_id' => $blurayId,
                'name' => 'Blu-ray',
                'slug' => 'blu-ray',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
