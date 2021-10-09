<x-bootstrap title="Edit">
    <x-nav />
    @auth
    <div class="w-3/4 container p-12 mx-auto">
        <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
            <div class="flex flex-col md:w-full">
                <h2 class="mb-4 font-bold md:text-xl text-heading ">Edit Address</h2>
                <form class="justify-center w-full mx-auto" method="post" action="/addresses/{{$address->id}}">
                    @csrf
                    @method('patch')
                    <div class="">
                        <label class="block mb-3 text-sm font-semibold text-gray-500">Phone number</label>
                        <x-form.input type="text" name="phone" placeholder="Phpne number" :value="old('phone', $address->phone)"/>
                        <label class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                        <x-form.textarea name="details" placeholder="Address with details...">{{old('details', $address->details)}}</x-form.textarea>
                        <div class="space-x-0 lg:flex lg:space-x-4">
                            <div class="w-full lg:w-1/2">
                                <x-form.error name="city"/>
                                <label for="city" class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                <input name="city" type="text" placeholder="City" value="{{old('city', $address->city)}}" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="w-full lg:w-1/2 ">
                                <x-form.error name="postcode"/>
                                <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">Postcode</label>
                                <input name="postcode" type="text" placeholder="Post Code" value="{{old('postcode', $address->postcode)}}" class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                        </div>
                        <div class="mt-6">
                            <button class="w-full px-6 py-2 text-white bg-gray-800 hover:bg-gray-900">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endauth
</x-bootstrap>
