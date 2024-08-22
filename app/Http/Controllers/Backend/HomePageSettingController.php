<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\HomePageSetting;
use Illuminate\Http\Request;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();
        $popularCategorySection = HomePageSetting::where('key', 'popular_category_section')->first();
        $sliderSectionOne = HomePageSetting::where('key', 'product_slider_section_one')->first();
        $sliderSectionTwo = HomePageSetting::where('key', 'product_slider_section_two')->first();
        $sliderSectionThree = HomePageSetting::where('key', 'product_slider_section_three')->first();

        return view('admin.home-page-setting.index', compact('categories', 'popularCategorySection', 'sliderSectionOne', 'sliderSectionTwo', 'sliderSectionThree'));
    }

    public function updatePopularCategorySection(Request $request)
    {
        $request->validate([
            'cat_1' => ['required'],
            'cat_2' => ['required'],
            'cat_3' => ['required'],
            'cat_4' => ['required']
        ], [
            'cat_1.required' => 'Category 1 field is required',
            'cat_2.required' => 'Category 2 field is required',
            'cat_3.required' => 'Category 3 field is required',
            'cat_4.required' => 'Category 4 field is required',
        ]);

        $data = [
            [
                'category' => $request->cat_1,
                'sub_category' => $request->sub_cat_1,
                'child_category' => $request->child_cat_1,
            ],
            [
                'category' => $request->cat_2,
                'sub_category' => $request->sub_cat_2,
                'child_category' => $request->child_cat_2,
            ],
            [
                'category' => $request->cat_3,
                'sub_category' => $request->sub_cat_3,
                'child_category' => $request->child_cat_3,
            ],
            [
                'category' => $request->cat_4,
                'sub_category' => $request->sub_cat_4,
                'child_category' => $request->child_cat_4,
            ]
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'popular_category_section'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        flash('Updated successfully');

        return redirect()->back();
    }


    public function updateProductSliderSectionOne(Request $request)
    {
        $request->validate([
            'cat_1' => ['required']
        ], [
            'cat_1.required' => 'Category filed is required'
        ]);

        $data = [
            'category' => $request->cat_1,
            'sub_category' => $request->sub_cat_1,
            'child_category' => $request->child_cat_1,
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_one'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        flash('Updated successfully');

        return redirect()->back();

    }

    public function updateProductSliderSectionTwo(Request $request)
    {
        $request->validate([
            'cat_1' => ['required']
        ], [
            'cat_1.required' => 'Category filed is required'
        ]);

        $data = [
            'category' => $request->cat_1,
            'sub_category' => $request->sub_cat_1,
            'child_category' => $request->child_cat_1,
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_two'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        flash('Updated successfully');

        return redirect()->back();
    }

    public function updateProductSliderSectionThree(Request $request)
    {
        $request->validate([
            'cat_1' => ['required'],
            'cat_2' => ['required']
        ], [
            'cat_1.required' => 'Part 1 Category filed is required',
            'cat_2.required' => 'Part 2 Category filed is required'

        ]);

        $data = [
            [
                'category' => $request->cat_1,
                'sub_category' => $request->sub_cat_1,
                'child_category' => $request->child_cat_1,
            ],
            [
                'category' => $request->cat_2,
                'sub_category' => $request->sub_cat_2,
                'child_category' => $request->child_cat_2,
            ]
        ];

        HomePageSetting::updateOrCreate(
            [
                'key' => 'product_slider_section_three'
            ],
            [
                'value' => json_encode($data)
            ]
        );

        flash('Updated successfully!');

        return redirect()->back();
    }

}
