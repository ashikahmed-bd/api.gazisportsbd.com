@extends('layouts.app')

@section('main')
    <section class="relative overflow-hidden">

        <div class="bg-black">
            <img src="/images/hero.jpg" class="w-full h-full object-cover" alt="">
        </div>
    </section>

    <section class="py-6">
        <div class="max-w-6xl mx-auto relative px-4">
            <div class="bg-white rounded-xl">
                <div class="grid grid-cols-1 lg:grid-cols-4">
                    <div class="flex gap-4 p-6">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl">
                            ⚽
                        </div>
                        <div>
                            <h4 class="font-bold">
                                Premium Quality
                            </h4>
                            <p class="text-gray-500 text-sm mt-1">
                                100% Original & High Quality
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 p-6">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl">
                            🚚
                        </div>
                        <div>
                            <h4 class="font-bold">
                                Free Shipping
                            </h4>
                            <p class="text-gray-500 text-sm mt-1">
                                On orders over ৳1999
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 p-6">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl">
                            ↻
                        </div>
                        <div>
                            <h4 class="font-bold">
                                Easy Returns
                            </h4>
                            <p class="text-gray-500 text-sm mt-1">
                                7 Days Return Policy
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 p-6">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl">
                            🛡
                        </div>
                        <div>
                            <h4 class="font-bold">
                                Secure Payment
                            </h4>
                            <p class="text-gray-500 text-sm mt-1">
                                100% Secure Checkout
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-black uppercase tracking-wide text-gray-900">Shop By Category</h2><a href="#"
                    class="text-red-600 text-sm font-semibold flex items-center gap-1 hover:underline">View
                    All <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-chevron-right ">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg></a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                <div class="relative rounded-lg overflow-hidden group cursor-pointer bg-gray-900 aspect-[3/4]"><img
                        src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                        alt="Club Jerseys"
                        class="w-full h-full object-cover opacity-70 group-hover:opacity-50 group-hover:scale-105 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <h3 class="text-white font-black text-sm uppercase">Club Jerseys</h3><a href="#"
                            class="text-gray-300 text-xs flex items-center gap-0.5 mt-1 hover:text-red-400">Shop Now <svg
                                xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right ">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg></a>
                    </div>
                </div>
                <div class="relative rounded-lg overflow-hidden group cursor-pointer bg-gray-900 aspect-[3/4]"><img
                        src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                        alt="National Teams"
                        class="w-full h-full object-cover opacity-70 group-hover:opacity-50 group-hover:scale-105 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <h3 class="text-white font-black text-sm uppercase">National Teams</h3><a href="#"
                            class="text-gray-300 text-xs flex items-center gap-0.5 mt-1 hover:text-red-400">Shop Now <svg
                                xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right ">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg></a>
                    </div>
                </div>
                <div class="relative rounded-lg overflow-hidden group cursor-pointer bg-gray-900 aspect-[3/4]"><img
                        src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                        alt="Custom Jerseys"
                        class="w-full h-full object-cover opacity-70 group-hover:opacity-50 group-hover:scale-105 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <h3 class="text-white font-black text-sm uppercase">Custom Jerseys</h3><a href="#"
                            class="text-gray-300 text-xs flex items-center gap-0.5 mt-1 hover:text-red-400">Shop Now <svg
                                xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right ">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg></a>
                    </div>
                </div>
                <div class="relative rounded-lg overflow-hidden group cursor-pointer bg-gray-900 aspect-[3/4]"><img
                        src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                        alt="Training Wear"
                        class="w-full h-full object-cover opacity-70 group-hover:opacity-50 group-hover:scale-105 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <h3 class="text-white font-black text-sm uppercase">Training Wear</h3><a href="#"
                            class="text-gray-300 text-xs flex items-center gap-0.5 mt-1 hover:text-red-400">Shop Now <svg
                                xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right ">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg></a>
                    </div>
                </div>
                <div class="relative rounded-lg overflow-hidden group cursor-pointer bg-gray-900 aspect-[3/4]"><img
                        src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=400"
                        alt="Accessories"
                        class="w-full h-full object-cover opacity-70 group-hover:opacity-50 group-hover:scale-105 transition-all duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <h3 class="text-white font-black text-sm uppercase">Accessories</h3><a href="#"
                            class="text-gray-300 text-xs flex items-center gap-0.5 mt-1 hover:text-red-400">Shop Now <svg
                                xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right ">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-black uppercase tracking-wide text-gray-900">Featured Jerseys</h2><a
                    href="#" class="text-red-600 text-sm font-semibold flex items-center gap-1 hover:underline">View
                    All <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevron-right ">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg></a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 overflow-x-auto pb-2">
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="FC Barcelona"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">FC Barcelona</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,399</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Real Madrid"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Real Madrid</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,399</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Argentina"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Argentina</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,299</span><span
                                class="text-gray-400 line-through text-xs">৳1,699</span><span
                                class="text-red-500 text-xs font-semibold">-24%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Brazil"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Brazil</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,299</span><span
                                class="text-gray-400 line-through text-xs">৳1,699</span><span
                                class="text-red-500 text-xs font-semibold">-24%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Manchester United"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Manchester United</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,399</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="relative bg-gray-900 overflow-hidden py-16">
        <div class="absolute inset-0 bg-cover bg-center opacity-30"
            style="background-image: url(&quot;https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1400&quot;);">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent"></div>
        <div class="absolute right-0 top-0 bottom-0 w-1/2 flex items-center justify-end pr-12 pointer-events-none"><span
                class="text-[180px] font-black text-red-600/20 leading-none select-none">10%</span></div>
        <div class="relative z-10 max-w-7xl mx-auto px-6">
            <p class="text-red-500 text-sm font-bold uppercase tracking-widest mb-2">Limited Time Offer</p>
            <h2 class="text-5xl sm:text-7xl font-black text-white uppercase leading-none mb-1">10% OFF</h2>
            <h3 class="text-xl sm:text-2xl font-black text-red-500 uppercase mb-5">On Your First Order</h3>
            <div class="border-2 border-gray-500 text-white px-5 py-2 inline-block rounded mb-6 text-sm font-semibold">Use
                Code: <span class="font-black">JERSEY10</span></div>
            <br>
            <button
                class="bg-red-600 hover:bg-red-700 text-white font-bold px-7 py-3 rounded text-sm tracking-wide transition-colors duration-200 flex items-center gap-2 uppercase">Shop
                Now
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-chevron-right ">
                    <path d="m9 18 6-6-6-6"></path>
                </svg>
            </button>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-black uppercase tracking-wide text-gray-900">Best Sellers</h2><a href="#"
                    class="text-red-600 text-sm font-semibold flex items-center gap-1 hover:underline">View All <svg
                        xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-chevron-right ">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg></a>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Paris Saint-Germain"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Paris Saint-Germain</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,399</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Liverpool FC"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Liverpool FC</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,399</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Juventus"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Juventus</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,299</span><span
                                class="text-gray-400 line-through text-xs">৳1,699</span><span
                                class="text-red-500 text-xs font-semibold">-24%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Bayern Munich"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Bayern Munich</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,299</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden group relative flex-shrink-0 w-[200px] sm:w-auto">
                    <div class="relative overflow-hidden bg-gray-50"><img
                            src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=300"
                            alt="Manchester City"
                            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105">
                        <button
                            class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow hover:shadow-md transition-shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-heart text-gray-400">
                                <path
                                    d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-3">
                        <p class="text-xs text-gray-500">Home Jersey 23/24</p>
                        <h4 class="font-semibold text-sm text-gray-900 mt-0.5">Manchester City</h4>
                        <div class="flex items-center gap-2 mt-2"><span
                                class="font-bold text-gray-900 text-sm">৳1,399</span><span
                                class="text-gray-400 line-through text-xs">৳1,799</span><span
                                class="text-red-500 text-xs font-semibold">-22%</span></div>
                        <button
                            class="mt-3 w-full bg-gray-900 text-white text-xs py-2 rounded flex items-center justify-center gap-1 hover:bg-red-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-shopping-cart ">
                                <circle cx="8" cy="21" r="1"></circle>
                                <circle cx="19" cy="21" r="1"></circle>
                                <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12">
                                </path>
                            </svg>Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-14 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-center text-xl font-black uppercase tracking-wide text-white mb-10">Why Choose Us?</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 border-2 border-red-600 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-package text-red-500">
                            <path d="m7.5 4.27 9 5.15"></path>
                            <path
                                d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z">
                            </path>
                            <path d="m3.3 7 8.7 5 8.7-5"></path>
                            <path d="M12 22V12"></path>
                        </svg>
                    </div>
                    <p class="text-white font-bold text-sm">Original Products</p>
                    <p class="text-gray-400 text-xs mt-1 leading-snug">100% Authentic Jerseys</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 border-2 border-red-600 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-dollar-sign text-red-500">
                            <line x1="12" x2="12" y1="2" y2="22"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <p class="text-white font-bold text-sm">Affordable Price</p>
                    <p class="text-gray-400 text-xs mt-1 leading-snug">Best Price for Best Quality</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 border-2 border-red-600 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-globe text-red-500">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                            <path d="M2 12h20"></path>
                        </svg>
                    </div>
                    <p class="text-white font-bold text-sm">Worldwide Shipping</p>
                    <p class="text-gray-400 text-xs mt-1 leading-snug">Fast &amp; Reliable Delivery</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 border-2 border-red-600 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-refresh-cw text-red-500">
                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"></path>
                            <path d="M21 3v5h-5"></path>
                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"></path>
                            <path d="M8 16H3v5"></path>
                        </svg>
                    </div>
                    <p class="text-white font-bold text-sm">Easy Returns</p>
                    <p class="text-gray-400 text-xs mt-1 leading-snug">Hassle-free Returns</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 border-2 border-red-600 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-lock text-red-500">
                            <rect width="18" height="11" x="3" y="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </div>
                    <p class="text-white font-bold text-sm">Secure Checkout</p>
                    <p class="text-gray-400 text-xs mt-1 leading-snug">100% Secure Payment</p>
                </div>
                <div class="flex flex-col items-center text-center">
                    <div class="w-14 h-14 border-2 border-red-600 rounded-full flex items-center justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-headphones text-red-500">
                            <path
                                d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3">
                            </path>
                        </svg>
                    </div>
                    <p class="text-white font-bold text-sm">Dedicated Support</p>
                    <p class="text-gray-400 text-xs mt-1 leading-snug">24/7 Customer Support</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center gap-3 mb-6">
                <h2 class="text-xl font-black uppercase tracking-wide text-gray-900">Follow Us On Instagram</h2><span
                    class="text-red-600 text-sm font-semibold">@jerseyshop</span>
            </div>
            <div class="grid grid-cols-3 sm:grid-cols-6 gap-2">
                <div class="relative overflow-hidden aspect-square rounded group cursor-pointer"><img
                        src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=200"
                        alt="instagram"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-instagram text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </div>
                </div>
                <div class="relative overflow-hidden aspect-square rounded group cursor-pointer"><img
                        src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=200"
                        alt="instagram"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-instagram text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </div>
                </div>
                <div class="relative overflow-hidden aspect-square rounded group cursor-pointer"><img
                        src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=200"
                        alt="instagram"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-instagram text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </div>
                </div>
                <div class="relative overflow-hidden aspect-square rounded group cursor-pointer"><img
                        src="https://images.pexels.com/photos/3621104/pexels-photo-3621104.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=200"
                        alt="instagram"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-instagram text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </div>
                </div>
                <div class="relative overflow-hidden aspect-square rounded group cursor-pointer"><img
                        src="https://images.pexels.com/photos/1884574/pexels-photo-1884574.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=200"
                        alt="instagram"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-instagram text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </div>
                </div>
                <div class="relative overflow-hidden aspect-square rounded group cursor-pointer"><img
                        src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=200"
                        alt="instagram"
                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute inset-0 bg-red-600/0 group-hover:bg-red-600/30 transition-colors duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="lucide lucide-instagram text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-red-600 py-12">
        <div class="max-w-7xl mx-auto px-4 flex flex-col sm:flex-row items-center gap-8">
            <div class="flex items-center gap-4 shrink-0">
                <div class="w-14 h-14 border-2 border-white/40 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-mail text-white">
                        <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                        <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-white font-black text-lg uppercase">Get The Latest Updates</h3>
                    <p class="text-red-200 text-sm max-w-xs">Subscribe to get special offers, free giveaways, and
                        once-in-a-lifetime deals.</p>
                </div>
            </div>
            <div class="flex flex-1 gap-2 w-full sm:w-auto">
                <input type="email" placeholder="Enter your email address..."
                    class="bg-white flex-1 px-4 py-3 rounded text-sm text-gray-900 outline-none focus:ring-2 focus:ring-white"
                    value="">
                <button
                    class="bg-gray-900 hover:bg-black text-white font-bold px-6 py-3 rounded text-sm tracking-wide transition-colors duration-200 uppercase whitespace-nowrap">Subscribe</button>
            </div>
        </div>
    </section>
@endsection
