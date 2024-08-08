@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Cart Details
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
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">product</a></li>
                            <li><a href="#">cart view</a></li>
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
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_tk">
                                            unit price
                                        </th>

                                        <th class="wsus__pro_tk">
                                            total
                                        </th>

                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>

                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                @foreach ($cartItems as $item)
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{ asset($item->options->image )}}" alt="product"
                                                                       class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{!! $item->name !!}</p>
                                            @foreach ($item->options->variants as $key => $variant)
                                                <span>{{ $key }}: {{ $variant['name'] }}
                                                    ({{ $settings->currency_icon.$variant['price'] }})
                                                </span>
                                            @endforeach
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>{{ $settings->currency_icon.$item->price }}</h6>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6 id="{{ $item->rowId }}">
                                                {{ $settings->currency_icon.($item->price + $item->options->variants_total) * $item->qty }}
                                            </h6>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <div class="product_qty_wrapper">
                                                <button class="btn btn-danger product-decrement">-</button>
                                                <input class="product-qty" data-rowid="{{ $item->rowId }}" type="text"
                                                       min="1" max="100" value="{{ $item->qty }}" readonly />
                                                <button class="btn btn-success product-increment">+</button>
                                            </div>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a href="{{ route('cart.remove-product', $item->rowId) }}"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                @if (count($cartItems) === 0)
                                    <tr class="d-flex" >
                                        <td class="wsus__pro_icon" rowspan="2" style="width:100%">
                                            Cart is empty!
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span id="sub_total">{{ $settings->currency_icon }}{{ getCartTotal() }}</span></p>
                        <p>coupon(-): <span id="discount">{{ $settings->currency_icon }}{{ getCartDiscount() }}</span></p>
                        <p class="total"><span>total:</span> <span id="cart_total">{{ $settings->currency_icon }}{{ getMainCartTotal() }}</span></p>

                        <form id="coupon_form">
                            <input type="text" placeholder="Coupon Code" name="coupon_code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="{{ route('user.checkout') }}">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="{{ route('home') }}"><i
                                class="fab fa-shopify"></i> Keep Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
          CART VIEW PAGE END
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

            function debounce(func, delay) {
                let debounceTimer;
                return function() {
                    const context = this;
                    const args = arguments;
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(() => func.apply(context, args), delay);
                };
            }

            function updateQuantity(rowId, quantity, successCallback, errorCallback) {
                $.ajax({
                    url: "{{ route('cart.update-quantity') }}",
                    method: 'POST',
                    data: {
                        rowId: rowId,
                        quantity: quantity
                    },
                    success: successCallback,
                    error: errorCallback
                });
            }

            // Show toast with a confirmation
            function showToastNotification(icon, title) {
                Swal.fire({
                    icon: icon,
                    title: title,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
            }

            // Show toast
            function showToast(icon, title) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
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

            const debouncedUpdateQuantity = debounce(function(rowId, quantity) {
                updateQuantity(rowId, quantity, function(data) {
                    if (data.status === 'success') {
                        let productId = '#' + rowId;
                        let totalAmount = "{{ $settings->currency_icon }}" + data.product_total;
                        $(productId).text(totalAmount);
                        renderCartSubTotal()
                        calculateCouponDiscount()
                        showToast('success', data.message);
                    } else if (data.status === 'error') {
                        showToast('error', data.message);
                    }
                }, function() {
                    showToastNotification('error', 'An error occurred. Please try again.');
                });
            }, 500);

            $('.product-decrement').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) - 1;
                let rowId = input.data('rowid');
                if (quantity < 1) {
                    quantity = 1;
                }
                input.val(quantity);
                debouncedUpdateQuantity(rowId, quantity);
            });

            $('.product-increment').on('click', function() {
                let input = $(this).siblings('.product-qty');
                let quantity = parseInt(input.val()) + 1;
                let rowId = input.data('rowid');
                if (quantity > 100) {
                    quantity = 100;
                }
                input.val(quantity);
                debouncedUpdateQuantity(rowId, quantity);
            });

            // Clear cart
            $('.clear_cart').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Warning',
                    text: 'This action will clear your cart!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, clear it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: "{{ route('cart.clear') }}",
                            success: function(data) {
                                    if (data.status === 'success') {
                                        window.location.reload();
                                    }
                                showToastNotification('success', data.message);
                            },
                            error: function() {
                                showToastNotification('error', 'An error occurred. Please try again.');
                            }
                        });
                    }
                });
            });

            // get subtotal of cart and put it on dom
            function renderCartSubTotal(){
                $.ajax({
                    method: 'GET',
                    url: "{{ route('cart.sidebar-product-subtotal') }}",
                    success: function(data) {
                        $('#sub_total').text("{{$settings->currency_icon}}"+data);
                    },
                    error: function(data) {
                            showToast('error', data);
                    }
                })
            }

            // apply coupon on cart
            $('#coupon_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('coupon.apply') }}",
                    data: formData,
                    success: function(data) {
                        if (data.status === 'error') {
                            showToast('error', data.message);
                        } else if (data.status === 'success') {
                            calculateCouponDiscount()
                            showToast('success', data.message);
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            // calculate discount amount
            function calculateCouponDiscount() {
                $.ajax({
                    method: 'GET',
                    url: "{{ route('coupon.calculation') }}",
                    success: function(data) {
                        if (data.status === 'success') {
                            $('#discount').text('{{ $settings->currency_icon }}' + parseFloat(data.discount).toFixed(2));
                            $('#cart_total').text('{{ $settings->currency_icon }}' + parseFloat(data.cart_total).toFixed(2));
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>
@endpush



