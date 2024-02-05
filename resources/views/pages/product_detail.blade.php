@extends('layout.master')
@section('content')

    <div class="bg-gray-100 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 mb-4">
                        <img class="w-full h-full object-cover"
                             src="https://source.unsplash.com/random/"
                             alt="Product Image">
                    </div>
                    <div class="flex -mx-2 mb-4">
                        <div class="w-1/2 px-2">
                            <button
                                class="w-full bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
                                Add
                                to Cart
                            </button>
                        </div>
                        <div class="w-1/2 px-2">
                            <button
                                class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-full font-bold hover:bg-gray-300">
                                Add
                                to Wishlist
                            </button>
                        </div>
                    </div>
                </div>
                <div class="md:flex-1 px-4">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">{{$product_data["product"]->name}}</h2>
                    <p class="mb-2">{{$product_data["category"]->category}}</p>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700">Price:</span>
                            <span class="text-gray-600">${{$product_data["product"]->price}}</span>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <div class="mr-4">
                            <span class="font-bold text-gray-700">Quantity:</span>
                            <span class="text-gray-600">{{$product_data["product"]->quantity}}</span>
                        </div>
                    </div>
                    <div class="flex mb-4">
                        <span class="font-bold text-gray-700">Availability:</span>
                        <span class="text-gray-600">In Stock</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700">Product Description:</span>
                        <p class="text-gray-600 text-sm mt-2">
                            {{$product_data["product"]->name}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
