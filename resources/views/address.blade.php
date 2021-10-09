<x-bootstrap title="Address">
    <x-nav />
    @auth
    <div class="container p-12">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="w-3/4 flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Add New Address</h2>
                <form class="justify-center w-full mx-auto" method="post" action="/addresses">
                    @csrf
                    <div class="">
                        <label class="block mb-3 text-sm font-semibold text-gray-500">Phone Number</label>
                        <x-form.input name="phone" type="text" placeholder="Phone number"/>
                        <label class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                        <x-form.textarea name="details" type="text" placeholder="Address with details..."/>
                        <div class="space-x-0 lg:flex lg:space-x-4">
                            <div class="w-full lg:w-1/2">
                                <x-form.error name="city"/>
                                <label for="city" class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                <input name="city" type="text" placeholder="City" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="w-full lg:w-1/2 ">
                                <x-form.error name="postcode"/>
                                <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">Postcode</label>
                                <input name="postcode" type="text" placeholder="Post Code" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="w-full px-6 py-2 text-white bg-gray-800 hover:bg-gray-900">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex flex-col w-1/4 ml-0 lg:ml-12 lg:w-2/5">
                @if(auth()->user()->addresses->count())
                    <h1 class="text-xl font-bold px-12 mb-5">Select Shipping Address</h1>
                    @foreach(auth()->user()->addresses as $address)
                        <div class="pl-12 inline-block mb-8">
                            <p class="font-semibold">{{auth()->user()->name}}</p>
                            <p>{{$address->phone}}</p>
                            <p>{{$address->details}}</p>
                            <form method="post" action="/select/address">
                                @csrf
                                <input type="hidden" name="address" value="{{$address->id}}">
                                <button class="p-2 bg-gray-400 hover:bg-gray-500 border rounded text-white mt-3 mb-3">Deliver to this address</button>
                            </form>
                            <form method="post" action="/addresses/{{$address->id}}">
                                @csrf
                                @method('delete')
                                <a href="/addresses/{{$address->id}}/edit" class="text-blue-500 mr-5 font-semibold">Edit</a>
                                <button class="text-red-500 font-semibold">Delete</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    @endauth
</x-bootstrap>
