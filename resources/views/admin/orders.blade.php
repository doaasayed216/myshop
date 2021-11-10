<x-admin-list>
    <section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 space-y-4" id="content">
        <header class="flex items-center justify-between" id="header">
            <div class="container flex mx-auto">
                <div class="flex border-2 rounded">
                    <button class="flex items-center justify-center px-4 border-r">
                        <svg class="w-6 h-6 text-gray-600" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 24 24">
                            <path
                                d="M16.32 14.9l5.39 5.4a1 1 0 0 1-1.42 1.4l-5.38-5.38a8 8 0 1 1 1.41-1.41zM10 16a6 6 0 1 0 0-12 6 6 0 0 0 0 12z">
                            </path>
                        </svg>
                    </button>
                    <form method="get" action="/admin/orders">
                        <input type="text" name="search" placeholder="Search..." class="px-4 py-2 w-80" value="{{ request('search') }}">
                    </form>
                </div>
            </div>
        </header>
        @admin
            <table class="w-full divide-y divide-gray-200 bg-red-500 -ml-5" id="table">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Customer
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Address
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phone
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Payment
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        details
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Total
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Placed on
                    </th>
                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        status
                    </th>
                    <th scope="col" class="relative px-4 py-3">
                        <span class="sr-only">Deliver</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($orders as $order)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->user->name}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->address->details}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->address->phone}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->cash ? 'cash': 'online'}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <ul>
                                    @foreach(json_decode($order->items) as $item)
                                        <li>{{$item->pivot->quantity}} {{$item->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->total + $order->shipping +
                                            ($order->cash ? 5 : 0)}}</div>
                        </td>

                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->created_at}}</div>
                        </td>

                        <td class="px-4 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$order->status}}</div>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <form method="post" action="/admin/orders/{{$order->id}}">
                                @csrf
                                @method('patch')
                                <button class="text-indigo-600 mr-5 hover:text-indigo-900" {{$order->status ? 'disabled' : ''}}>Deliver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endadmin
        @seller
        <table class="w-full divide-y divide-gray-200 " id="table">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Item
                </th>

                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Quantity
                </th>

                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Placed on
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($orders as $order)
                @foreach(json_decode($order->items) as $item)
                    @if($item->user_id === auth()->user()->id)
                        <tr>
                            <td class="px-4 py-4">
                                <div class="text-sm text-gray-900">{{$item->name}}</div>
                            </td>

                            <td class="px-4 py-4">
                                <div class="text-sm text-gray-900">{{$item->pivot->quantity}}</div>
                            </td>

                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$order->created_at}}</div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
        @endseller
    </section>
</x-admin-list>
