@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Flash Sale
@endsection

@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Flash Sale</h4>
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="">Flash Sale</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        DAILY DEALS DETAILS START
    ==============================-->
    <section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__offer_details_banner">
                            <img src="{{ asset('frontend/assets/images/offer_banner_2.png') }}" alt="offrt img" class="img-fluid w-100">
                            <div class="wsus__offer_details_banner_text">
                                <p>apple watch</p>
                                <span>up 50% 0ff</span>
                                <p>for all poduct</p>
                                <p><b>today only</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__offer_details_banner">
                            <img src="{{ asset('frontend/assets/images/offer_banner_3.png') }}" alt="offrt img" class="img-fluid w-100">
                            <div class="wsus__offer_details_banner_text">
                                <p>xiaomi power bank</p>
                                <span>up 37% 0ff</span>
                                <p>for all poduct</p>
                                <p><b>today only</b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>flash sell</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">ends time :</span>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($flashSaleItems as $item)
                        @php
                            $product = \App\Models\Product::find($item->product_id);
                        @endphp
                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <span class="wsus__new">{{ productType($product->product_type) }}</span>
                                @if(checkDiscount($product))
                                    <span class="wsus__minus">{{ calculateDiscountPercent($product->price, $product->offer_price) }}%</span>
                                @endif
                                <a class="wsus__pro_link" href="javascript:void(0);">
                                    <img src="{{ asset($product->thumb_image) }}" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="
                                        @if(isset($product->productImageGalleries[0]->image))
                                            {{ asset($product->productImageGalleries[0]->image) }}
                                        @else
                                            {{ asset($product->thumb_image) }}
                                        @endif
                                    " alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="far fa-eye"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="far fa-heart"></i></a></li>
                                    <li><a href="javascript:void(0);"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="javascript:void(0);">{{ $product->category->name }}</a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(133 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="javascript:void(0);">{{ $product->name }}</a>
                                        @if(checkDiscount($product))
                                            <p class="wsus__price">{{ $settings->currency_icon }}{{ $product->offer_price }}<del>{{ $settings->currency_icon }}{{ $product->price }}</del></p>
                                        @else
                                            <p class="wsus__price">{{ $settings->currency_icon }}{{ $product->offer_price }}></p>
                                        @endif
                                    <form class="shopping-cart-form">
                                        <div class="wsus__selectbox">
                                            <div class="row">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                @foreach($product->variants as $variant)
                                                    @if($variant->status != 0)
                                                        <div class="col-xl-6 col-sm-6">
                                                            <h5 class="mb-2">{{ $variant->name }}: </h5>
                                                            <select class="select_2" name="variants_items[]">
                                                                @foreach($variant->productVariantItems as $variantItem)
                                                                    @if($variantItem->status != 0)
                                                                        <option value="{{ $variantItem->id }}" {{ $variantItem->is_default === 1 ? 'selected' : '' }}>
                                                                            {{ $variantItem->name }} ({{ $settings->currency_icon }}{{ $variantItem->price }})
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="wsus__quentity">
                                            <h5>quantity :</h5>
                                            <div class="select_number">
                                                <input class="number_area" name="qty" type="text" min="1" max="100" value="1" />
                                            </div>
                                        </div>

                                        <ul class="wsus__button_area">
                                            <li><button type="submit" class="add_cart" href="#">add to cart</button></li>

                                            <li><a style="border: 1px solid gray;
                                        padding: 7px 11px;
                                        border-radius: 100%;" href="javascript:void(0);" class="add_to_wishlist"
                                                   data-id="{{ $product->id }}"><i class="fal fa-heart"></i></a>
                                            </li>

                                            <li>
                                                <button type="button" style="border: 1px solid gray;
                                        padding: 7px 11px;
                                        margin-left: 7px;
                                        border-radius: 100%; background-color: #0088cc" class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-comment-alt text-light"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    @if($flashSaleItems->hasPages())
                        {{ $flashSaleItems->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================
        DAILY DEALS DETAILS END
    ==============================-->
@endsection

@push('scripts')
    @if(isset($flashSaleDate))
        <script>
            $(document).ready(function() {
                simplyCountdown('.simply-countdown-one', {
                    year: {{ date('Y', strtotime($flashSaleDate->end_date)) }},
                    month: {{ date('m', strtotime($flashSaleDate->end_date)) }},
                    day: {{ date('d', strtotime($flashSaleDate->end_date)) }},
                });
            })
        </script>
    @endif
@endpush
