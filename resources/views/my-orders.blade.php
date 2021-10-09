<x-bootstrap title="Orders">
    <x-nav />
    @auth
    <div class="container p-12 mx-auto min-h-screen bg-gray-100">
        <div class="flex-row w-full px-0 mx-auto md:flex-row">
            <h1 class="w-1/2 mx-auto text-xl mb-5">Your Orders</h1>
            @foreach(auth()->user()->orders as $order)
                <div class="w-1/2 mx-auto mb-4 p-4 bg-white rounded-xl shadow-lg">
                    <div class="flex flex-row  mb-5">
                        <div class="w-1/2 inline float-left">
                            <p><span class="font-semibold">Order placed on:</span> <time>{{($order->created_at)->format('F j, Y')}}</time></p>
                            <p><span class="font-semibold">Order ID:</span> {{'#' . $order->id}}</p>
                            <p><span class="font-semibold">Order Status:</span>
                                {{$order->delivered ? 'Delivered' : 'Ready for delivery'}}</p>
                        </div>
                        <div class="w-1/2 inline float-right">
                            <p><span class="font-semibold">Recipient:</span> {{$order->user->name}}</p>
                            <p><span class="font-semibold">Payment method:</span> {{$order->cash ? 'Cash On Delivery(COD)' : 'Online Payment'}}</p>
                            <p><span class="font-semibold">Total:</span> {{'EGP ' .$order->total}}</p>
                        </div>
                    </div>
                    <hr class="font-bold">
                    <div class="block p-6">
                        @foreach(json_decode($order->items) as $item)
                            <div class="inline flex mb-3"> <!-- product -->
                                <div class="">
                                    <img class="h-24" src="{{asset('storage/'. $item->img_path)}}" alt="" width="100">
                                </div>
                                <div class="flex flex-col justify-between ml-4 flex-grow">
                                    <p class="font-bold">{{$item->name}}</p>
                                    <p class="text-red-500 font-semibold">{{'EGP '. $item->price}}</p>
                                    <p class="">{{'Quantity: '. $item->pivot->quantity}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if(!$order->delivered)
                        <div class="relative">
                            <form method="post" action="/order/{{$order->id}}" class="w-1/3 absolute bottom-0 right-0 bg-red-200 mx-auto">
                                @csrf
                                @method('delete')
                                <button class="rounded bg-gray-800 hover:bg-gray-900 p-3 text-white w-full">Cancel</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    @endauth
</x-bootstrap>
