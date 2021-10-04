<x-bootstrap title="Checkout">
    <x-nav />
    @if(auth()->user()->addresses)
        <h1 class="text-xl font-bold p-12">Select Shipping Address</h1>
        @foreach(auth()->user()->addresses as $address)
            <div class="pl-12 inline-block mr-5">
                <p class="font-semibold">{{auth()->user()->name}}</p>
                <p>{{$address->details}}</p>
                <form method="post" action="/select/address">
                    @csrf
                    <input type="hidden" name="address" value="{{$address->id}}">
                    <button class="p-2 bg-yellow-500 border rounded-xl text-white mt-3">Deliver to this address</button>
                </form>
                <form method="post" action="/addresses/{{$address->id}}">
                    @csrf
                    @method('delete')
                    <a href="/addresses/{{$address->id}}/edit" class="text-blue-500 mr-5">Edit</a>
                    <button class="text-red-500">Delete</button>
                </form>
            </div>
        @endforeach
    @endif

    <div class="container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Add New Address
                </h2>
                <form class="justify-center w-full mx-auto" method="post" action="/address/save">
                    @csrf
                    <div class="">
                        <div class="w-full lg:w-full ">
                            <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                Phone number</label>
                            <input name="phone" type="text" placeholder="Phone number"
                                   class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <div class="w-full">
                                <label for="Address"
                                       class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                <textarea
                                    class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    name="details" cols="20" rows="4" placeholder="Address"></textarea>
                            </div>
                        </div>
                        <div class="space-x-0 lg:flex lg:space-x-4">
                            <div class="w-full lg:w-1/2">
                                <label for="city"
                                       class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                <input name="city" type="text" placeholder="City"
                                       class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="w-full lg:w-1/2 ">
                                <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                    Postcode</label>
                                <input name="postcode" type="text" placeholder="Post Code"
                                       class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="flex items-center mt-4">
                            <label class="flex items-center text-sm group text-heading">
                                <input type="checkbox"
                                       class="w-5 h-5 border border-gray-300 rounded focus:outline-none focus:ring-1">
                                <span class="ml-2">Save this information for next time</span></label>
                        </div>

                        <div class="mt-4">
                            <button
                                    class="w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900">Process</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">

            </div>
        </div>
    </div>
</x-bootstrap>
