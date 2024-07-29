@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Product Details
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
                        <h4>Products Details</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:void(0);">product</a></li>
                            <li><a href="javascript:void(0);">product details</a></li>
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
        PRODUCT DETAILS START
    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5" style="z-index:999">
                        <div id="sticky_pro_zoom">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if($product->video_link)
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                           href="{{ $product->video_link }}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif
                                    <ul class='exzoom_img_ul'>
                                        <li><img class="zoom ing-fluid w-100" src="{{ asset($product->thumb_image) }}"
                                                 alt="product"></li>
                                        @foreach($product->productImageGalleries as $productImage)
                                            <li><img class="zoom ing-fluid w-100" src="{{ asset($productImage->image) }}"
                                                     alt="product"></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="javascript:void(0);">{{ $product->name }}</a>
                            @if($product->qty > 0)
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> ({{ $product->qty }} item)</p>
                            @elseif($product->qty === 0)
                                <p class="wsus__stock_area"><span class="in_stock">stock out</span> ({{ $product->qty }} item)</p>
                            @endif
                            @if(checkDiscount($product))
                                <h4 class="wsus__price">{{ $settings->currency_icon }}{{ $product->offer_price }}
                                    <del>{{ $settings->currency_icon }}{{ $product->price }}</del>
                                </h4>
                            @else
                                <h4 class="wsus__price">{{ $settings->currency_icon }}{{ $product->offer_price }}></h4>
                            @endif
                            <p class="review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>20 review</span>
                            </p>
                            <p class="description">{!! $product->short_description !!}</p>
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
                            <p class="brand_model"><span>brand :</span> {{$product->brand->name}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="wsus__pro_det_description">
                                <div class="wsus__details_bg">
                                    <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-home-tab7" data-bs-toggle="pill"
                                                    data-bs-target="#pills-home22" type="button" role="tab"
                                                    aria-controls="pills-home" aria-selected="true">Description</button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-contact" type="button" role="tab"
                                                    aria-controls="pills-contact" aria-selected="false">Vendor Info</button>
                                        </li>

                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-contact-tab2" data-bs-toggle="pill"
                                                    data-bs-target="#pills-contact2" type="button" role="tab"
                                                    aria-controls="pills-contact2" aria-selected="false">Reviews</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent4">
                                        <div class="tab-pane fade  show active " id="pills-home22" role="tabpanel"
                                             aria-labelledby="pills-home-tab7">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="wsus__description_area">
                                                        {!! $product->long_description !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                             aria-labelledby="pills-contact-tab">
                                            <div class="wsus__pro_det_vendor">
                                                <div class="row">
                                                    <div class="col-xl-6 col-xxl-5 col-md-6">
                                                        <div class="wsus__vebdor_img">
                                                            <img src="{{ asset($product->vendor->banner) }}" alt="vendor" class="img-fluid w-100">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-xxl-7 col-md-6 mt-4 mt-md-0">
                                                        <div class="wsus__pro_det_vendor_text">
                                                               <h4>{{ $product->vendor->user->name }}</h4>
                                                                {{-- here stars --}}
                                                            <p><span>Store Name:</span> {{ $product->vendor->shop_name }}</p>
                                                            <p><span>Address:</span> {{ $product->vendor->address }}</p>
                                                            <p><span>Phone:</span> {{ $product->vendor->phone }}</p>
                                                            <p><span>mail:</span> {{ $product->vendor->email }}</p>
                                                            <a href="javascript:void(0);" class="see_btn">visit store</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <div class="wsus__vendor_details">
                                                            {!! $product->vendor->description !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-contact2" role="tabpanel"
                                             aria-labelledby="pills-contact-tab2">
                                            <div class="wsus__pro_det_review">
                                                <div class="wsus__pro_det_review_single">
                                                    <div class="row">
                                                        <div class="col-xl-8 col-lg-7">
                                                            <div class="wsus__comment_area">
                                                                {{-- here reviews --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-4 col-lg-5 mt-4 mt-lg-0">
                                                            {{-- here are the feedback responses --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        PRODUCT DETAILS END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Show toast
            function showToast(icon, title) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: icon,
                    title: title
                });
            }

            //Add product into cart
            $('.shopping-cart-form').on('submit', function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    data: formData,
                    url: "{{ route('cart.add') }}",
                    success: function(data){
                        getCartCount();
                        fetchSidebarCartProducts();
                        $('.mini_cart_actions').removeClass('d-none');
                        showToast("success", data.message);
                    },
                    error: function(xhr){
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        showToast("error", errorMessage);
                    }
                });
            });

            //Count cart
            function getCartCount() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.count') }}",
                    success: function(data){
                        $('#cart-count').text(data);
                    },
                    error: function(xhr){
                        console.log('Error fetching cart count:', xhr);
                    }
                });
            }

            //Show cart from sidebar
            function fetchSidebarCartProducts(){
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.products') }}",
                    success: function(data){
                        let $cartWrapper = $('.mini_cart_wrapper');
                        $cartWrapper.html("");
                        let html = '';
                        for(let item in data){
                            let product = data[item];
                            html += `
                                <li id="mini_cart_${ product.rowId}">
                                    <div class="wsus__cart_img">
                                        <a href="{{ url('product-detail') }}/${ product.options.slug }">
                                            <img src="{{ asset('/') }}${ product.options.image }" alt="product" class="img-fluid w-100">
                                        </a>
                                        <a class="wsis__del_icon remove_sidebar_product" data-id="${ product.rowId }" href="#">
                                            <i class="fas fa-minus-circle"></i>
                                        </a>
                                    </div>
                                    <div class="wsus__cart_text">
                                        <a class="wsus__cart_title"
                                            href="{{ url('product-detail') }}/${ product.options.slug }">${ product.name }</a>
                                        <p>{{ $settings->currency_icon }}${ product.price }</p>
                                        <small>Variants total: {{ $settings->currency_icon }}${ product.options.variants_total }</small>
                                        <br>
                                        <small>Qty: ${ product.qty }</small>
                                    </div>
                                </li>
                            `;
                        }
                        $cartWrapper.html(html);
                        getSidebarCartSubtotal();
                    },
                    error: function(xhr) {
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        showToast("error", errorMessage);
                    }
                });
            }

            //Remove product from sidebar
            $('body').on('click', '.remove_sidebar_product', function(e) {
                e.preventDefault();
                let rowId = $(this).data('id')
                $.ajax({
                    method: 'POST',
                    url: "{{ route('cart.remove-sidebar-product') }}",
                    data: {
                        rowId: rowId
                    },
                    success: function(data){
                        let productId = '#mini_cart_'+rowId;
                        let $cartWrapper = $('.mini_cart_wrapper');
                        $(productId).remove();

                        // Check if the mini cart is empty after removing the product
                        if($cartWrapper.find('li').length === 0) {
                            $cartWrapper.html('<li>Cart is empty</li>');
                            $('.mini_cart_actions').addClass('d-none');
                        }
                        showToast("success", data.message);
                        getSidebarCartSubtotal();
                    },
                    error: function(xhr){
                        let errorMessage = xhr.status + ': ' + xhr.statusText;
                        showToast("error", errorMessage);
                    }
                });
            });

            //Get sidebar cart sub total
            function getSidebarCartSubtotal() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.sidebar-product-subtotal') }}",
                    success: function(data){
                        $('#mini_cart_subtotal').text("{{ $settings->currency_icon }}"+data);
                    },
                    error: function(data){
                        showToast("error", data);
                    }
                });


            }

            // Initial fetch to update mini cart content and visibility
            fetchSidebarCartProducts();
        });
    </script>
@endpush
