<x-bootstrap title="Orders">
    <x-nav />
    @foreach(auth()->user()->orders as $order)
        <div class="p-12 w-full">
            <div class="mr-5 inline w-1/2">
                <p><span class="font-bold">Order placed at:</span>{{$order->created_at}}</p>
                <p><span class="font-bold">Order id:</span>{{$order->id}}</p>
                <p><span class="font-bold">Order status:</span>{{$order->delivered ? 'Delivered' : 'Shipped'}}</p>
            </div>
            <div class="inline w-1/2">
                <p><span class="font-bold">Recipient:</span>{{$order->user->name}}</p>
                <p><span class="font-bold">Payment method:</span>{{$order->cash ? 'Cash On Delivery(COD)' : 'Online payment'}}</p>
                <p><span class="font-bold">Total price:</span>{{$order->total}}</p>
            </div>

            <div>
                <form method="post" action="/orders/{{$order->id}}">
                    @csrf
                    @method('delete')
                    <button>Cancel</button>
                </form>
            </div>

        </div>
    @endforeach
</x-bootstrap>
