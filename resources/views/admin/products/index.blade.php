<x-admin-list>
    <div class="h-1/2 w-4/5 p-4 border border-gray-200 rounded-xl shadow-l bg-white mt-10 mb-10 mx-auto">
        <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
            <header class="flex items-center justify-between">
                <div class="container flex mx-auto">
                    <div class="flex">
                        <button class="flex items-center justify-center px-4 border-r">
                            <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                        </button>
                        <form method="get" action="/admin/products" id="form">
                            @if(request('category'))
                                <input type="hidden" name="category" value="{{request('category')}}">
                            @endif
                            <div class="inline">
                                <input type="text"
                                       name="search"
                                       placeholder="Search..."
                                       class="px-4 py-2 w-80 mr-5 border-2 rounded"
                                       value="{{ request('search') }}">
                            </div>
                            <div class="inline">
                                <input type="range" id="myRange" name="price" value="500" min="500" max="{{$max}}" step="500" oninput="this.nextElementSibling.value = this.value">
                                <output>All</output>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="relative lg:inline-flex bg-gray-100 rounded-xl mr-10">
                    <x-filter-dropdown>
                        <x-slot name="trigger">
                            <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
                                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

                                <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
                            </button>
                        </x-slot>
                        <x-filter-dropdownItem
                            href="/admin/products?{{ http_build_query(request()->except('category', 'page')) }}"
                            :active="request()->routeIs('home') && is_null(request()->getQueryString())"
                        >
                            All
                        </x-filter-dropdownItem>

                        @foreach ($categories as $category)
                            <x-filter-dropdownItem
                                href="/admin/products?category={{ $category->id }}&{{ http_build_query(request()->except('category', 'page')) }}"
                                :active='request()->fullUrlIs("*?category={$category->id}*")'
                            >
                                {{ ucwords($category->name) }}
                            </x-filter-dropdownItem>
                        @endforeach
                    </x-filter-dropdown>
                </div>

                <div class="relative lg:inline-flex  rounded-xl mr-10">

                </div>

                <a href="/admin/products/create" class="hover:bg-gray-200 hover:text-gray-800 group flex items-center rounded-md bg-gray-100 text-gray-600 text-sm font-medium px-4 py-2">
                    <svg class="group-hover:text-gray-600 text-gray-500 mr-2" width="12" height="20" fill="currentColor">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
                    </svg>
                    New
                </a>
            </header>


                <table class="w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Code
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Description
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>

                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Seller
                        </th>

                        <th scope="col" class="relative px-4 py-3">
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($products as $product)
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$product->code}}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$product->name}}</div>
                            </td>
                            <td class="px-4 py-4">
                                <div class="text-sm text-gray-900">{{$product->description}}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$product->category->name}}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$product->price . ' EGP'}}</div>
                            </td>

                            <td class="px-4 py-4 whitespace-nowrap">
                                <img src="{{asset('storage/'.$product->img_path)}}" height="50" width="50">
                            </td>

                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$product->user->name}}</div>
                            </td>

                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="/admin/products/{{$product->id}}/edit" class="text-indigo-600 mr-5 hover:text-indigo-900">Edit</a>
                                <form method="POST" action="/admin/products/{{$product->id}}" class="text-red-600 hover:text-red-900 inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                            </td>

                        </tr>

                    @endforeach
                    </tbody>
                </table>

                <div class="mt-40">
                    {{$products->links()}}
                </div>
        </section>
    </div>
</x-admin-list>
<script>
    var slider = document.getElementById("myRange");
    slider.onmouseup = function () {
        document.getElementById("form").submit();
    }
</script>
