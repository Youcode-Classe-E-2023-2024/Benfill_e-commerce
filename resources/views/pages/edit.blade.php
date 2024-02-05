@extends('layout.master')
@section('content')

<div class="p-8 rounded border border-gray-200 h-screen">
    <h1 class="font-medium text-3xl">Add New Product</h1>
    <p class="text-gray-600 mt-6">Sell online, in person, and around the world</p>
    @if ($errors->any())
        <div class="flex justify-evenly">
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-red-600">{{$error}}</li>
                    @break
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{url('update/' . $data["product_data"]->id)}}">
        @csrf
        <div class="mt-8 grid lg:grid-cols-2 gap-4">
            <div><label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Product Name</label>
                <input type="text" name="name" id="name"
                       class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                       placeholder="Enter product name" value='{{$data["product_data"]->name}}'/>
            </div>
            <div><label for="Description" class="text-sm text-gray-700 block mb-1 font-medium">Description</label>
                <input type="text" name="description" id="Description"
                       class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                       placeholder="Describe your product" value='{{$data["product_data"]->description}}'/>
            </div>
            <div><label for="price" class="text-sm text-gray-700 block mb-1 font-medium">Price</label>
                <input type="number" name="price" id="price"
                       class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                       placeholder="(ex. 1990DHS)" value='{{$data["product_data"]->price}}'/>
            </div>
            <div><label for="quantity" class="text-sm text-gray-700 block mb-1 font-medium">Quantity</label> <input
                    type="number" name="quantity" id="quantity"
                    class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                    placeholder="100 qty" value='{{$data["product_data"]->quantity}}'/>
            </div>
            <div><select name="category" id="category"
                         class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                    @foreach ($data["categories"] as $category)
                        <option value="{{ $category['id'] }}">{{ $category['category'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="space-x-4 mt-8">
            <button type="submit"
                    class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-600 active:bg-blue-700 disabled:opacity-50">
                Save
            </button>
            <a href="{{url ('/')}}"
               class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">Cancel</a>
        </div>
    </form>
</div>
@stop
