<x-bootstrap title="{{$product->name}}">
    <x-nav/>
        <section class="text-gray-700 body-font overflow-hidden bg-white">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                    <img src="{{asset('storage/' . $product->img_path)}}" alt="ecommerce" class="lg:w-1/2 w-full object-cover object-center rounded border border-gray-200">
                    <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                        <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
                        <div class="flex mb-4">
                            <span class="flex items-center">
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                 </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                </svg>
                                <a href="/?category={{$product->category_id}}" class="text-gray-600 ml-3">{{$product->category->name}}</a>
                            </span>
                        </div>
                        <p class="leading-relaxed">{{$product->description}}</p>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-200 mb-5">
                            <div class="flex">
                                <span class="mr-3">Color</span>
                                <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button class="border-2 border-gray-300 ml-1 bg-red-500 rounded-full w-6 h-6 focus:outline-none"></button>
                            </div>
                            <div class="flex ml-6 items-center">
                                <span class="mr-3">Size</span>
                                <div class="relative">
                                    <select class="rounded border appearance-none border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base pl-3 pr-10">
                                        <option>SM</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                    <span class="absolute right-0 top-0 h-full w-10 text-center text-gray-600 pointer-events-none flex items-center justify-center">
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4" viewBox="0 0 24 24">
                                            <path d="M6 9l6 6 6-6"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @if((!auth()->user() || !auth()->user()->cart || !auth()->user()->cart->products->contains($product)))
                            <form method="post" action="/cart/{{$product->id}}">
                                @csrf
                                <div class="flex">
                                    <span class="title-font font-medium text-2xl text-red-700 mr-5">{{'EGP ' . $product->price}}</span>
                                    <input type="number" name="quantity" min="1" value="1" class="rounded border w-1/6 border-gray-400 py-2 focus:outline-none focus:border-red-500 text-base px-3">
                                    <button class="flex ml-auto text-white bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-900 rounded">Add to cart</button>
                                    <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                            <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        @else
                            <form method="post" action="/cart/{{$product->id}}">
                                @csrf
                                @method('delete')
                                <button class="w-1/3 float-right inline-block bg-white hover:bg-gray-100 text-gray-800 border-2 border-gray-800 hover:border-gray-900 px-3 py-2 rounded">
                                    Remove from cart
                                </button>
                            </form>
                        @endif
                        <div class="mt-10">
                            <h1 class="text-gray-700 text-lg title-font font-medium mb-3">Reviews</h1>
                            @auth
                                <div class="mb-5">
                                    <form method="post" action="/reviews">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <x-form.textarea name="body" placeholder="Say your opinion..."/>
                                        <button class="ml-auto text-white bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-900 rounded">Submit</button>
                                    </form>
                                </div>
                            @endauth
                            <div class="space-y-5">
                                @foreach($product->reviews as $review)
                                    <div class="bg-gray-50 w-full p-4 relative">
                                        <article class="flex space-x-4">
                                            <div class="flex-shrink-0">
                                                <img src="https://i.pravatar.cc/60?u={{ $review->user_id }}" alt="" width="60" height="60" class="rounded-xl">
                                            </div>
                                            <div class="w-3/4">
                                                <header class="block mb-4">
                                                    <h3 class="font-bold">{{ $review->user->name }}</h3>
                                                    <p class="text-xs">Posted
                                                        <time>{{ $review->created_at->format('F j, Y, g:i a') }}</time>
                                                    </p>
                                                </header>
                                                <p class="block">{{$review->body}}</p>
                                            </div>
                                        </article>
                                        @can('delete_review', $review)
                                            <form method="post" action="/reviews/{{$review->id}}" class="absolute top-0 right-0 mr-5 mt-5">
                                                @csrf
                                                @method('delete')
                                                <button class="font-bold text-red-500">X</button>
                                            </form>
                                        @endcan
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-bootstrap>
