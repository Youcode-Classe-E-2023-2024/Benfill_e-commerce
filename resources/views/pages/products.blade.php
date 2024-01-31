<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
<nav x-data="{ isOpen: false }" class="relative bg-white shadow">
    <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
        <div class="flex items-center justify-between">
            <a href="{{ url('/') }}">
                <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
            </a>

            <!-- Mobile menu button -->
            <div class="flex lg:hidden">
                <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                        aria-label="toggle menu">
                    <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/>
                    </svg>

                    <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
             class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
            <div class="flex flex-col md:flex-row md:mx-6">
                <a class="my-2 text-gray-700 transition-colors duration-300 transform hover:text-blue-500 md:mx-4 md:my-0"
                   href="{{ url('/') }}">Home</a>
                <a class="my-2 text-gray-700 transition-colors duration-300 transform hover:text-blue-500 md:mx-4 md:my-0"
                   href="#">Shop</a>
                <a class="my-2 text-gray-700 transition-colors duration-300 transform hover:text-blue-500 md:mx-4 md:my-0"
                   href="#">Contact</a>
                <a class="my-2 text-gray-700 transition-colors duration-300 transform hover:text-blue-500 md:mx-4 md:my-0"
                   href="#">About</a>
            </div>

            <div class="flex justify-center md:block">
                <a class="relative text-gray-700 transition-colors duration-300 transform hover:text-gray-600"
                   href="#">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.70711 15.2929C4.07714 15.9229 4.52331 17 5.41421 17H17M17 17C15.8954 17 15 17.8954 15 19C15 20.1046 15.8954 21 17 21C18.1046 21 19 20.1046 19 19C19 17.8954 18.1046 17 17 17ZM9 19C9 20.1046 8.10457 21 7 21C5.89543 21 5 20.1046 5 19C5 17.8954 5.89543 17 7 17C8.10457 17 9 17.8954 9 19Z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="absolute top-0 left-0 p-1 text-xs text-white bg-blue-500 rounded-full"></span>
                </a>
            </div>
        </div>
    </div>
</nav>

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
                                    src="https://images.unsplash.com/photo-1577982787983-e07c6730f2d3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2059&q=80"
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


<footer class="px-4 py-8">
    <div
        class="container flex flex-wrap items-center justify-center mx-auto space-y-4 sm:justify-between sm:space-y-0">
        <div class="flex flex-row pr-3 space-x-4 sm:space-x-8">
            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"
                     class="w-5 h-5 rounded-full">
                    <path
                        d="M18.266 26.068l7.839-7.854 4.469 4.479c1.859 1.859 1.859 4.875 0 6.734l-1.104 1.104c-1.859 1.865-4.875 1.865-6.734 0zM30.563 2.531l-1.109-1.104c-1.859-1.859-4.875-1.859-6.734 0l-6.719 6.734-6.734-6.734c-1.859-1.859-4.875-1.859-6.734 0l-1.104 1.104c-1.859 1.859-1.859 4.875 0 6.734l6.734 6.734-6.734 6.734c-1.859 1.859-1.859 4.875 0 6.734l1.104 1.104c1.859 1.859 4.875 1.859 6.734 0l21.307-21.307c1.859-1.859 1.859-4.875 0-6.734z">
                    </path>
                </svg>
            </div>
            <ul class="flex flex-wrap items-center space-x-4 sm:space-x-8">
                <li>
                    <a rel="noopener noreferrer" href="#">Terms of Use</a>
                </li>
                <li>
                    <a rel="noopener noreferrer" href="#">Privacy</a>
                </li>
            </ul>
        </div>
        <ul class="flex flex-wrap pl-3 space-x-4 sm:space-x-8">
            <li>
                <a rel="noopener noreferrer" href="#">Instagram</a>
            </li>
            <li>
                <a rel="noopener noreferrer" href="#">Facebook</a>
            </li>
            <li>
                <a rel="noopener noreferrer" href="#">Twitter</a>
            </li>
        </ul>
    </div>
</footer>
</body>

</html>
