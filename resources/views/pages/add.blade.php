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
        <form method="post" action="{{url('store-form')}}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm flex justify-center font-bold text-gray-500 tracking-wide">Attach Picture</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                        <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                            <!---<svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-blue-400 group-hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>-->
                            <p class="pointer-none text-gray-500 "><span class="text-sm">Drag and drop</span> files here
                                <br/> or <a href="" id="" class="text-blue-600 hover:underline">select a file</a> from
                                your
                                computer</p>
                        </div>
                        <input type="file" name="picture" accept="image/*" class="hidden">
                    </label>
                </div>
            </div>
            <div class="mt-8 grid lg:grid-cols-2 gap-4">
                <div><label for="name" class="text-sm text-gray-700 block mb-1 font-medium">Product Name</label>
                    <input type="text" name="name" id="name"
                           class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                           placeholder="Enter product name"/>
                </div>
                <div><label for="Description" class="text-sm text-gray-700 block mb-1 font-medium">Description</label>
                    <input type="Description" name="description" id="Description"
                           class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                           placeholder="Describe your product"/>
                </div>
                <div><label for="price" class="text-sm text-gray-700 block mb-1 font-medium">Price</label>
                    <input type="number" name="price" id="price"
                           class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                           placeholder="(ex. 1990DHS)"/>
                </div>
                <div><label for="quantity" class="text-sm text-gray-700 block mb-1 font-medium">Quantity</label> <input
                        type="number" name="quantity" id="quantity"
                        class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full"
                        placeholder="100 qty"/>
                </div>
                <div><select name="category" id="category"
                             class="bg-gray-100 border border-gray-200 rounded py-1 px-3 block focus:ring-blue-500 focus:border-blue-500 text-gray-700 w-full">
                        @foreach ($categories as $category)
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
                <!-- Secondary -->
                <a href="{{url ('/')}}"
                   class="py-2 px-4 bg-white border border-gray-200 text-gray-600 rounded hover:bg-gray-100 active:bg-gray-200 disabled:opacity-50">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@stop
