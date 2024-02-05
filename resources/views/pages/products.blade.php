@extends('layout.master')
@section('content')

    <div class="flex justify-end m-6">
        <div class="relative w-[20rem]">
            <form method="get" action="{{ url('sort') }}" class="absolute z-10 w-full">
                @csrf
                <select name="sort_by" class="rounded bg-white ring-1 ring-gray-300 w-full p-2">
                    <option value="">Sort By</option>
                    <option value="date">Date</option>
                    <option value="alphabet">Alphabetical</option>
                </select>
                <button type="submit" class="w-full mt-2 p-2 rounded bg-white ring-1 ring-gray-300">
                    Sort
                </button>
            </form>
        </div>
    </div>


    <!-- component -->
    <div class="flex justify-center my-24">
        <div class="h-full relative w-5/6 flex gap-2 flex-wrap items-center justify-center">
            @foreach ($products as $product)
                <div class="container w-72">
                    <div class="max-w-md w-full bg-gray-400 shadow-lg rounded-xl p-6">
                        <div class="flex flex-col ">
                            <div class="">
                                <div class="relative h-62 w-full mb-3">
                                    <div class="absolute flex flex-col top-0 right-0 p-3">
                                        <button
                                            class="transition ease-in duration-300 bg-gray-800  hover:text-purple-500 shadow hover:shadow-md text-gray-500 rounded-full w-8 h-8 text-center p-1">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <img
                                        src="{{ asset($product->picture) }}"
                                        alt="Just a flower" class=" w-full   object-fill  rounded-2xl">
                                </div>
                                <div class="flex-auto justify-evenly">
                                    <div class="flex flex-wrap ">
                                        <div class="w-full flex-none text-sm flex items-center text-gray-600">
                                            <span class="mr-2 text-gray-800"> {{ $product->category_name }} </span>
                                        </div>
                                        <div class="flex items-center w-full justify-between min-w-0 ">
                                            <a href="{{ url('product/' . $product->id) }}">
                                                <h2
                                                    class="text-lg mr-auto cursor-pointer text-gray-200 hover:text-purple-800 truncate ">
                                                    {{ $product['name'] }}
                                                </h2>
                                            </a>
                                            <div
                                                class="flex items-center bg-green-400 text-white text-xs px-2 py-1 ml-3 rounded-lg">
                                                INSTOCK
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div class="text-xl text-white font-semibold mt-1">${{ $product['price'] }}.00
                                        </div>
                                        <span
                                            class="text-gray-800 whitespace-nowrap self-center">{{ $product->quantity }}
                                            Pcs</span>
                                    </div>
                                    <div class="lg:flex  py-4  text-sm text-gray-600">
                                        <div class="flex-1 inline-flex items-center  mb-3">
                                            <div
                                                class="w-full flex-none text-sm justify-center flex items-center text-gray-600">
                                                <p>{{ $product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2 text-sm font-medium justify-between">
                                        <a href="{{url('edit/' . $product->id)}}"
                                           class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-purple-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-purple-600 ">
                                            <span>Edit</span>
                                        </a>
                                        <a href="{{ url('product/' . $product->id) }}"
                                           class="transition ease-in duration-300 bg-gray-700 hover:bg-gray-800 border hover:border-gray-500 border-gray-700 hover:text-white  hover:shadow-lg text-gray-400 rounded-full w-9 h-9 text-center p-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                        <a href="{{url('delete/' . $product->id)}}"
                                           class="transition ease-in duration-300 inline-flex items-center text-sm font-medium mb-2 md:mb-0 bg-red-500 px-5 py-2 hover:shadow-lg tracking-wider text-white rounded-full hover:bg-red-600 ">
                                            <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{ $products->links() }}
    {{-- <div class="bg-white p-4 flex items-center justify-center flex-wrap">
        <nav aria-label="Page navigation">
            <ul class="inline-flex">
                <li><button
                        class="px-4 py-2 text-rose-600 transition-colors duration-150 bg-white border border-r-0 border-rose-600 rounded-l-lg focus:shadow-outline hover:bg-rose-100">Prev</button>
                </li>
                <li><button
                        class="px-4 py-2 text-rose-600 transition-colors duration-150 bg-white border border-r-0 border-rose-600 focus:shadow-outline">1</button>
                </li>
                <li><button
                        class="px-4 py-2 text-white transition-colors duration-150 bg-rose-600 border border-r-0 border-rose-600 focus:shadow-outline">2</button>
                </li>
                <li><button
                        class="px-4 py-2 text-rose-600 transition-colors duration-150 bg-white border border-r-0 border-rose-600 focus:shadow-outline hover:bg-rose-100">3</button>
                </li>
                <li><button
                        class="px-4 py-2 text-rose-600 transition-colors duration-150 bg-white border border-rose-600 rounded-r-lg focus:shadow-outline hover:bg-rose-100">Next</button>
                </li>
            </ul>
        </nav>
    </div> --}}

@stop
