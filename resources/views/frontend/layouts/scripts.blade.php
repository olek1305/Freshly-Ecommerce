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
