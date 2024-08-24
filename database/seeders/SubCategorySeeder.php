<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sub-categories for Electronics
        $electronicsId = DB::table('categories')->where('slug', 'electronics')->value('id');
        DB::table('sub_categories')->insert([
            ['category_id' => $electronicsId, 'name' => 'Televisions', 'slug' => 'televisions', 'status' => 1],
            ['category_id' => $electronicsId, 'name' => 'Laptops', 'slug' => 'laptops', 'status' => 1],
        ]);

        // Insert child-categories for Televisions
        $televisionsId = DB::table('sub_categories')->where('slug', 'televisions')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $electronicsId, 'sub_category_id' => $televisionsId, 'name' => 'LED TVs', 'slug' => 'led-tvs', 'status' => 1],
        ]);

        // Insert sub-categories for Fashion
        $fashionId = DB::table('categories')->where('slug', 'fashion')->value('id');
        DB::table('sub_categories')->insert([
            ['category_id' => $fashionId, 'name' => 'Women\'s Clothing', 'slug' => 'womens-clothing', 'status' => 1],
            ['category_id' => $fashionId, 'name' => 'Men\'s Footwear', 'slug' => 'mens-footwear', 'status' => 1],
        ]);

        // Insert child-categories for Women's Clothing
        $womensClothingId = DB::table('sub_categories')->where('slug', 'womens-clothing')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $fashionId, 'sub_category_id' => $womensClothingId, 'name' => 'Dresses', 'slug' => 'dresses', 'status' => 1],
        ]);

        // Insert child-categories for Men's Footwear
        $mensFootwearId = DB::table('sub_categories')->where('slug', 'mens-footwear')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $fashionId, 'sub_category_id' => $mensFootwearId, 'name' => 'Sports Shoes', 'slug' => 'sports-shoes', 'status' => 1],
        ]);

        // Insert sub-categories for Health & Beauty
        $healthBeautyId = DB::table('categories')->where('slug', 'health-beauty')->value('id');
        DB::table('sub_categories')->insert([
            ['category_id' => $healthBeautyId, 'name' => 'Skincare', 'slug' => 'skincare', 'status' => 1],
            ['category_id' => $healthBeautyId, 'name' => 'Vitamins', 'slug' => 'vitamins', 'status' => 1],
        ]);

        // Insert child-categories for Skincare
        $skincareId = DB::table('sub_categories')->where('slug', 'skincare')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $healthBeautyId, 'sub_category_id' => $skincareId, 'name' => 'Skincare', 'slug' => 'skincare', 'status' => 1],
        ]);

        // Insert child-categories for Vitamins
        $vitaminsId = DB::table('sub_categories')->where('slug', 'vitamins')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $healthBeautyId, 'sub_category_id' => $vitaminsId, 'name' => 'Vitamins', 'slug' => 'vitamins', 'status' => 1],
        ]);

        // Insert sub-categories for Home & Garden
        $homeGardenId = DB::table('categories')->where('slug', 'home-garden')->value('id');
        DB::table('sub_categories')->insert([
            ['category_id' => $homeGardenId, 'name' => 'Sofas', 'slug' => 'sofas', 'status' => 1],
            ['category_id' => $homeGardenId, 'name' => 'Lawn Mowers', 'slug' => 'lawn-mowers', 'status' => 1],
        ]);

        // Insert child-categories for Sofas
        $sofasId = DB::table('sub_categories')->where('slug', 'sofas')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $homeGardenId, 'sub_category_id' => $sofasId, 'name' => 'Sofas', 'slug' => 'sofas', 'status' => 1],
        ]);

        // Insert child-categories for Lawn Mowers
        $lawnMowersId = DB::table('sub_categories')->where('slug', 'lawn-mowers')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $homeGardenId, 'sub_category_id' => $lawnMowersId, 'name' => 'Lawn Mowers', 'slug' => 'lawn-mowers', 'status' => 1],
        ]);

        // Insert sub-categories for Sports & Recreation
        $sportsRecreationId = DB::table('categories')->where('slug', 'sports-recreation')->value('id');
        DB::table('sub_categories')->insert([
            ['category_id' => $sportsRecreationId, 'name' => 'Treadmills', 'slug' => 'treadmills', 'status' => 1],
            ['category_id' => $sportsRecreationId, 'name' => 'Surfboards', 'slug' => 'surfboards', 'status' => 1],
        ]);

        // Insert child-categories for Treadmills
        $treadmillsId = DB::table('sub_categories')->where('slug', 'treadmills')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $sportsRecreationId, 'sub_category_id' => $treadmillsId, 'name' => 'Treadmills', 'slug' => 'treadmills', 'status' => 1],
        ]);

        // Insert child-categories for Surfboards
        $surfboardsId = DB::table('sub_categories')->where('slug', 'surfboards')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $sportsRecreationId, 'sub_category_id' => $surfboardsId, 'name' => 'Surfboards', 'slug' => 'surfboards', 'status' => 1],
        ]);

        // Insert sub-categories for Books & Media
        $booksMediaId = DB::table('categories')->where('slug', 'books-media')->value('id');
        DB::table('sub_categories')->insert([
            ['category_id' => $booksMediaId, 'name' => 'Fiction', 'slug' => 'fiction', 'status' => 1],
            ['category_id' => $booksMediaId, 'name' => 'Blu-ray', 'slug' => 'blu-ray', 'status' => 1],
        ]);

        // Insert child-categories for Fiction
        $fictionId = DB::table('sub_categories')->where('slug', 'fiction')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $booksMediaId, 'sub_category_id' => $fictionId, 'name' => 'Fiction', 'slug' => 'fiction', 'status' => 1],
        ]);

        // Insert child-categories for Blu-ray
        $blurayId = DB::table('sub_categories')->where('slug', 'blu-ray')->value('id');
        DB::table('child_categories')->insert([
            ['category_id' => $booksMediaId, 'sub_category_id' => $blurayId, 'name' => 'Blu-ray', 'slug' => 'blu-ray', 'status' => 1],
        ]);
    }
}
