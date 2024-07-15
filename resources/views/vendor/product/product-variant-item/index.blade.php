@extends('vendor.layouts.master')

@section('title')
    {{ $settings->site_name }} || Product Variant Item
@endsection


@section('content')
    <!--=============================
    DASHBOARD START
  ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <a href="{{route('vendor.products.index')}}" class="btn btn-warning mb-4"><i class="fas fa-long-arrow-left"></i> Back</a>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Product Variant Item</h3>
                        <h6>Product: {{$product->name}}</h6>
                        <div class="create_button">
                            <a href="{{route('vendor.products-variant-item.create', ['productId' => $product->id, 'variantId' => $variant->id])}}"
                               class="btn btn-primary"><i class="fas fa-plus"></i> Create variant item</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
      DASHBOARD START
    ==============================-->
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id')

                $.ajax({
                    url: "{{ route('vendor.products-variant-item.change-status') }}",
                    method: 'PUT',
                    contentType: 'application/json',
                    data: JSON.stringify({
                        isChecked: isChecked,
                        id: id
                    }),
                    success: function(data) {
                        Swal.fire({
                            title: 'Success',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: 'Error',
                            text: error,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
            })
        })
    </script>
@endpush
