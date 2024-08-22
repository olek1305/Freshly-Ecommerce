@php
    $popularCategories = json_decode($popularCategory->value, true);
@endphp

<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Popular Categories</h3>
                    <div class="monthly_top_filter">
                        @foreach ($popularCategories as $key => $categoryData)
                            @php
                                $categoryType = null;
                                $category = null;

                                if (!empty($categoryData['child_category'])) {
                                    $categoryType = 'child_category';
                                    $category = \App\Models\ChildCategory::find($categoryData['child_category']);
                                } elseif (!empty($categoryData['sub_category'])) {
                                    $categoryType = 'sub_category';
                                    $category = \App\Models\SubCategory::find($categoryData['sub_category']);
                                } elseif (!empty($categoryData['category'])) {
                                    $categoryType = 'category';
                                    $category = \App\Models\Category::find($categoryData['category']);
                                }
                            @endphp

                            @if ($category)
                                <button class="{{ $loop->index === 0 ? 'auto_click active' : ''}}" data-filter=".category-{{ $loop->index }}">
                                    {{ $category->name }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                    @foreach ($popularCategories as $key => $categoryData)
                        @php
                            $products = [];
                            if (!empty($categoryData['child_category'])) {
                                $products = \App\Models\Product::where('child_category_id', $categoryData['child_category'])->get();
                            } elseif (!empty($categoryData['sub_category'])) {
                                $products = \App\Models\Product::where('sub_category_id', $categoryData['sub_category'])->get();
                            } elseif (!empty($categoryData['category'])) {
                                $products = \App\Models\Product::where('category_id', $categoryData['category'])->get();
                            }
                        @endphp

                        @foreach ($products as $item)
                            <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3 category-{{ $loop->parent->index }}">
                                <a class="wsus__hot_deals__single" href="{{ route('product-detail', $item->slug) }}">
                                    <div class="wsus__hot_deals__single_img">
                                        <img src="{{ asset($item->thumb_image) }}" alt="{{ $item->name }}" class="img-fluid w-100" style="width: 150px; height: 150px;">
                                    </div>
                                    <div class="wsus__hot_deals__single_text">
                                        <h5>{{ Str::limit($item->name, 20) }}</h5>
                                        <p class="wsus__rating">
{{--                                            @for ($i = 1; $i <= 5; $i++)--}}
{{--                                                <i class="{{ $i <= $item->reviews_avg_rating ? 'fas' : 'far' }} fa-star"></i>--}}
{{--                                            @endfor--}}
                                        </p>
                                        @if (checkDiscount($item))
                                            <p class="wsus__tk">
                                                {{ $settings->currency_icon }}{{ $item->offer_price }}
                                                <del>{{ $settings->currency_icon }}{{ $item->price }}</del>
                                            </p>
                                        @else
                                            <p class="wsus__tk">{{ $settings->currency_icon }}{{ $item->price }}</p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
