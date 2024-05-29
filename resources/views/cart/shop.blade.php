<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                @foreach( $products as $product )
                <div class="col-md-4 mt-2">
                    <div class="card" style="width: 18rem">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h1 class="card-title" style="font-size: 20px">{{ $product->name }}</h1>
                            <h1 class="card-title text-primary" style="font-size: 20px">${{ $product->price }}</h1>
                            <p class="card-text">{{ $product->description }}</p>
                            <a href="{{ route('addToCart', $product->id) }}" class="btn btn-danger mt-3">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
