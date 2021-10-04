<x-admin-list />
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block w-6/7 sm:px-6 lg:px-8 ml-10 mt-10">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="w-full divide-y divide-gray-200">
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
                            status
                        </th>
                        <th scope="col" class="relative px-4 py-3">
                            <span class="sr-only">Edit</span>
                            <span class="sr-only">Delete</span>
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
                                <div class="text-sm text-gray-900">{{$order->cash ? 'cash': $order->user->payment->card_number}}</div>
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
                                <div class="text-sm text-gray-900">{{$order->delivered ? 'Delivered' : 'shipped'}}</div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form method="post" action="/admin/orders/{{$order->id}}">
                                    @csrf
                                    @method('patch')
                                    <button class="text-indigo-600 mr-5 hover:text-indigo-900">Deliver</button>
                                </form>
                            </td>

                        </tr>

                    @endforeach


                    <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
