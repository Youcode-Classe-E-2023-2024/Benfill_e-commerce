<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
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
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="absolute top-0 left-0 p-1 text-xs text-white bg-blue-500 rounded-full"></span>
                </a>
            </div>
        </div>
    </div>
</nav>

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
                            <br/> or <a href="" id="" class="text-blue-600 hover:underline">select a file</a> from your
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
