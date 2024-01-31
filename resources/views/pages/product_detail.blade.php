<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product_data["product"]->name}} Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav x-data="{ isOpen: false }" class="relative bg-white shadow">
        <div class="container px-6 py-4 mx-auto md:flex md:justify-between md:items-center">
            <div class="flex items-center justify-between">
                <a href="{{url('/')}}">
                    <img class="w-auto h-6 sm:h-7" src="https://merakiui.com/images/full-logo.svg" alt="">
                </a>

                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 hover:text-gray-600 focus:outline-none focus:text-gray-600"
                        aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white md:mt-0 md:p-0 md:top-0 md:relative md:bg-transparent md:w-auto md:opacity-100 md:translate-x-0 md:flex md:items-center">
                <div class="flex flex-col md:flex-row md:mx-6">
                    <a class="my-2 text-gray-700 transition-colors duration-300 transform hover:text-blue-500 md:mx-4 md:my-0"
                        href="{{url('/')}}">Home</a>
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
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                        <span class="absolute top-0 left-0 p-1 text-xs text-white bg-blue-500 rounded-full"></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>

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
                                class="w-full bg-gray-900 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">Add
                                to Cart</button>
                        </div>
                        <div class="w-1/2 px-2">
                            <button
                                class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-full font-bold hover:bg-gray-300">Add
                                to Wishlist</button>
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
