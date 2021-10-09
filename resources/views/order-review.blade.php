<x-bootstrap title="Order Review">
    <x-nav />
    @auth
    <div class="container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full float-left">
                <h1 class="mb-4 font-bold md:text-xl text-heading ">Review Your Order</h1>
                <div class="border border-black w-3/4 p-5 mb-5">
                    <div class="float-left">
                        <h2 class="text-l font-semibold">Shipping address <a href="/addresses/create" class="text-blue-500">Change</a></h2>
                        <p>{{auth()->user()->name}}</p>
                        <p>{{$address->details}}</p>
                        <p>{{$address->phone}}</p>
                    </div>
                    <div class="float-right mr-10">
                        <h2 class="text-l font-semibold">Payment method <a href="/payment/create" class="text-blue-500">Change</a></h2>
                        <p>{{session('cash') ? 'Cash On Delivery(COD)' : 'Online Payment'}}</p>
                    </div>
                </div>
                <div class="border border-black w-3/4 p-5">
                    <p class="text-xl font-semibold mb-5 text-gray-500">
                        Delivery: <time>{{(now()->addDay(2))->format('F j, Y')}}</time>
                    </p>
                    <div class="float-left">
                        @foreach(auth()->user()->cart->products as $product)
                            <div class="flex mb-3"> <!-- product -->
                                <div class="">
                                    <img class="h-24" src="{{asset('storage/'. $product->img_path)}}" alt="" width="100">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <p class="font-bold">{{$product->name}}</p>
                                    <p class="text-red-500 font-semibold">{{'EGP '. $product->price}}</p>
                                    <p class="">{{'Quantity: '. $product->pivot->quantity}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="float-right">
                        <h2 class="font-semibold">Delivery option:</h2>
                        <input type="radio" checked> {{session()->get('shipping') == 10 ? 'EGP 10.00 Standard delivery' : 'EGP 21.00 Faster delivery'}}
                    </div>
                 </div>
            </div>
            <div class="float-right border border-black w-1/4 mt-10 p-5 h-64 mr-5">
                <form method="post" action="/order">
                    @csrf
                    <button class="border rounded-xl bg-gray-800 hover:bg-gray-900 p-3 text-white text-center w-full mb-5">Place Your Order</button>
                </form>
                <div>
                <h2 class="text-l font-semibold">Order Summary</h2>
                    <div class="float-left">
                        <p>Items: </p>
                        <p>Shipping & holding: </p>
                        <p>Cash on delivery Fee: </p>
                        <hr>
                        <p class="text-xl font-bold text-red-700 mt-3">Order total: </p>
                    </div>
                    <div class="float-right">
                        <p>{{'EGP '. auth()->user()->cart->total_price}}</p>
                        <p>{{'EGP '. session()->get('shipping')}}</p>
                        <p>{{session()->get('cash') ? 'EGP 5' : '0'}}</p>
                        <hr>
                        <p class="text-xl font-bold text-red-700 mt-3">
                            {{'EGP '. auth()->user()->cart->total_price + session()->get('shipping') + (session()->get('cash') ? 5 : 0)}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
</x-bootstrap>
