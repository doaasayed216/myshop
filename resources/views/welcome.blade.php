<x-bootstrap title="Home">
    <x-nav/>
    <div class="bg-gray-100">
        <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 space-y-4" id="content">
            <header class="flex w-1/2 mx-auto items-center justify-between" id="header">
                <div class="container  flex items-center space-x-5">
                    <div class="flex">
                        <form method="get" action="/" id="form" class="lg:flex items-center space-x-5">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{request('category')}}">
                            @endif
                            <div class="inline">
                                <input type="text" name="search" placeholder="Search..." class=" p-2 w-full mb-3 border-2 rounded"
                                       value="{{ request('search') }}">
                            </div>
                            <div class="flex inline">
                                <input type="range" id="myRange" name="price" value="500" min="500" max="12000" step="500" oninput="this.nextElementSibling.value = this.value">
                                <output>All</output>
                            </div>
                        </form>
                    </div>

                    <div class="rounded-xl mr-10 border border-gray-400">
                        <x-filter-dropdown>
                            <x-slot name="trigger">
                                <button class="py-2 pl-3 pr-9 bg-gray-100 rounded-xl text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                                    {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                                    <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
                                </button>
                            </x-slot>
                            <x-filter-dropdownItem href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                                :active="request()->routeIs('home') && is_null(request()->getQueryString())">All
                            </x-filter-dropdownItem>

                            @foreach ($categories as $category)
                                <x-filter-dropdownItem href="/?category={{ $category->id }}&{{ http_build_query(request()->except('category', 'page')) }}"
                                    :active='request()->fullUrlIs("*?category={$category->id}*")'>{{ ucwords($category->name) }}
                                </x-filter-dropdownItem>
                            @endforeach
                        </x-filter-dropdown>
                    </div>
                </div>
            </header>
        </section>
        <div class="w-5/6 mt-5 justify-center mx-auto ">
            <div class="grid sm:grid-cols-2 md:grid-cols-3 -mr-10">
                @foreach($products as $product)
                    <div class="inline-block bg-white rounded-xl shadow-xl p-2 mb-5 mr-10">
                        <div class="bg-gray-400 h-64 rounded-t-lg p-4 bg-no-repeat bg-center bg-cover" style="background-image: url({{asset('storage/' . $product->img_path)}})">
                            <div class="text-right">
                                <button class="text-pink-500 hover:text-pink-600 p-2 rounded-full" style="background: rgba(0,0,0,0.3)">
                                    <svg class="w-6 h-6" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M12,21.35L10.55,20.03C5.4,15.36 2,12.27 2,8.5C2,5.41 4.42,3 7.5,3C9.24,3 10.91,3.81 12,5.08C13.09,3.81 14.76,3 16.5,3C19.58,3 22,5.41 22,8.5C22,12.27 18.6,15.36 13.45,20.03L12,21.35Z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-between items-start px-2 pt-2">
                            <div class="p-2 flex-grow">
                                <a href="/products/{{$product->id}}" class="font-bold text-black-50">{{$product->name}}</a>
                            </div>
                            <div class="p-2 text-right">
                                <div class="text-red-500 font-semibold text-lg font-poppins">{{'EGP '. $product->price}}</div>
                            </div>
                        </div>
                        <div class="flex justify-center items-center px-2 pb-2 mx-auto">
                            <div class="w-4/5 p-2">
                                @if((!auth()->user() || !auth()->user()->cart || !auth()->user()->cart->products->contains($product)))
                                    <form method="post" action="/cart/{{$product->id}}">
                                        @csrf
                                        <input type="number" min="1" step="1" name="quantity" value="1" class="w-1/4 inline border border-gray-500 mr-5 p-2">
                                        <button class="w-3/5 inline-block  bg-white hover:bg-gray-100 text-gray-800 border-2 border-gray-800 hover:border-gray-900 px-3 py-2 rounded">
                                            Add to cart
                                        </button>
                                    </form>
                                @else
                                    <form method="post" action="/cart/{{$product->id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="w-full inline-block bg-white hover:bg-gray-100 text-gray-800 border-2 border-gray-800 hover:border-gray-900 px-3 py-2 rounded">
                                            Remove from cart
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <div class="mt-40">
            {{$products->links()}}
        </div>
    </div>
    <script>
        let slider = document.getElementById("myRange");
        slider.onmouseup = function () {
            document.getElementById("form").submit();
        }
    </script>
</x-bootstrap>
