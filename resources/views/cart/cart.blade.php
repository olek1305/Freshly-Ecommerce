<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="h-100 gradient-custom">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center my-4">
                        <div class="col-md-8">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert"></button>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                            <div class="card mb-4">
                                <div class="card-header py-3">
                                    <h5 class="mb-0">Cart - {{ Cart::content()->count() }} items</h5>
                                </div>
                                <div class="card-body">

                                    @foreach (Cart::content() as $product)
                                        <!-- Single item -->
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                                <!-- Image -->
                                                <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                                     data-mdb-ripple-color="light">
                                                    <img src="{{ asset($product->options->image) }}" class="w-100"  alt=""/>
                                                    <a href="#">
                                                        <div class="mask"
                                                             style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                    </a>
                                                </div>
                                                <!-- Image -->
                                            </div>

                                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                                <!-- Data -->
                                                <p><strong>{{ $product->name }}</strong></p>
                                                <p>Color: red</p>
                                                <p>Size: M</p>

                                                <a href="{{ route('removeProduct', $product->rowId) }}" class="btn btn-danger btn-sm mb-2 mt-3">
                                                    remove
                                                </a>
                                                <!-- Data -->
                                            </div>

                                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                                <!-- Quantity -->
                                                <div class="d-flex mb-4" style="max-width: 300px">
                                                    <a href="{{ route('qtyDecrement', $product->rowId) }}" class="btn btn-primary me-2">
                                                        &#8722;
                                                    </a>

                                                    <div class="form-outline">
                                                        <input id="form1" min="0" name="quantity" value="{{ $product->qty }}"
                                                               type="number" class="form-control"  style="width: 100px;"/>
                                                    </div>

                                                    <a href="{{ route('qtyIncrement', $product->rowId) }}" class="btn btn-primary ms-2">
                                                        &#43;
                                                    </a>
                                                </div>
                                                <!-- Quantity -->

                                                <!-- Price -->
                                                <p class="text-start text-md-center">
                                                    <strong>${{ $product->price }}</strong>
                                                </p>
                                                <!-- Price -->
                                            </div>

                                            <hr class="my-4">
                                        </div>
                                    @endforeach



                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</x-app-layout>
