<x-bootstrap title="My Cart">
    <x-nav />
    @auth
    @if(auth()->user()->cart)
        <div class="container mx-auto mt-10">
            <div class="lg:flex shadow-md my-10">
                <div class="w-full lg:w-3/4 bg-white px-10 py-10">
                    <div class="flex justify-between border-b pb-8">
                        <h1 class="font-semibold text-2xl">Shopping Cart</h1>
                        <h2 class="font-semibold text-2xl">{{count(auth()->user()->cart->products) . ' Items'}}</h2>
                    </div>
                    <div class="flex mt-10 mb-5">
                        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
                        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
                    </div>
                    @foreach(auth()->user()->cart->products as $product)
                        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
                            <div class="flex w-2/5"> <!-- product -->
                                <div class="">
                                    <img class="h-24" src="{{asset('storage/'. $product->img_path)}}" alt="" width="100">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <span class="font-bold text-sm">{{Illuminate\Support\Str::limit($product->name, 10)}}</span>
                                    <form method="POST" action="/cart/{{$product->id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</button>
                                    </form>
                                </div>
                            </div>
                            <div class="flex justify-center w-1/5">
                                <span class="mx-2 border text-center w-8"> {{$product->pivot->quantity}}</span>
                            </div>
                            <span class="text-center w-1/5 font-semibold text-sm">{{$product->price}}</span>
                            <span class="text-center w-1/5 font-semibold text-sm">{{$product->price * $product->pivot->quantity}}</span>
                        </div>
                    @endforeach
                    <a href="/" class="flex font-semibold text-indigo-600 text-sm mt-10">
                        <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
                        Continue Shopping
                    </a>
                </div>
                <div id="summary" class="w-full lg:w-1/4 px-8 py-10">
                    <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
                    <div class="flex justify-between mt-10 mb-5">
                        <span class="font-semibold text-sm uppercase">{{count(auth()->user()->cart->products) . ' Items'}}</span>
                        <span class="font-semibold text-sm">
                            {{auth()->user()->cart->total_price . ' EGP'}}
                        </span>
                    </div>
                    <form method="post" action="/select/shipping">
                        @csrf
                        <div>
                            <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
                            <select name="shipping" class="block p-2 text-gray-600 w-full text-sm">
                                <option value="10">Standard shipping - $10.00</option>
                                <option value="21">Faster shipping - $21.00</option>
                            </select>
                        </div>
{{--                        <div class="py-10">--}}
{{--                            <label for="promo" class="font-semibold inline-block mb-3 text-sm uppercase">Promo Code</label>--}}
{{--                            <input type="text" id="promo" placeholder="Enter your code" class="p-2 text-sm w-full">--}}
{{--                        </div>--}}
{{--                        <button class="bg-red-500 hover:bg-red-600 px-5 py-2 text-sm text-white uppercase">Apply</button>--}}
                        <div class="border-t mt-8">
                            <button class="bg-gray-800 hover:bg-gray-900 font-semibold py-3 text-sm text-white uppercase w-full">Proceed</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="flex flex-col w-1/2 mx-auto mt-10 items-center justify-items p-10">
            <div>
                <img src="/images/bag.png" width="300" height="300" class="mx-auto">
            </div>
            <div>
                <p class="mx-auto pl-5 text-medium font-semibold mt-5">Your cart is empty, <a href="/" class="text-blue-500 mx-auto">continue shopping now</a></p>
            </div>
        </div>
    @endif
    @endauth
</x-bootstrap>
