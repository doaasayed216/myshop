<x-bootstrap title="Edit">
    <x-nav />

<div class="container p-12 mx-auto">
    <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
        <div class="flex flex-col md:w-full">
            <h2 class="mb-4 font-bold md:text-xl text-heading ">Edit Address
            </h2>
            <form class="justify-center w-full mx-auto" method="post" action="/addresses/{{$address->id}}">
                @csrf
                @method('patch')
                <div class="">
                    <div class="w-full lg:w-full ">
                        <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                            Phone number</label>
                        <input name="phone" type="text" placeholder="Phone number"
                               value="{{old('phone', $address->phone)}}"
                               class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Address"
                                   class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                            <textarea
                                class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                name="details" cols="20" rows="4" placeholder="Address">{{old('details', $address->details)}}</textarea>
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="city"
                                   class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                            <input name="city" type="text" placeholder="City"
                                   value="{{old('city', $address->city)}}"
                                   class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                Postcode</label>
                            <input name="postcode" type="text" placeholder="Post Code"
                                   value="{{old('postcode', $address->postcode)}}"
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
    </div>
</div>
</x-bootstrap>
