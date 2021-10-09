<x-bootstrap title="payment">
    <x-nav />
    @auth
    <div class="mt-10 pt-16">
        <div class="w-1/2 container mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Secure payment info</h1>
                <form method="post" action="/payment">
                    @csrf
                    <div class="mb-3">
                        <input type="radio" name="cash" class="mt-3 mb-3"> Cash On Delivery
                    </div>
                    <div class="mb-8">
                        <input type="radio" name="existing_card" class="mt-3 mb-3"> Pay with your existing card
                    </div>
                    <x-form.error name="user_id" />
                    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    <div class="mb-3">
                        <label class="block mb-3 text-sm font-semibold text-gray-500">Card Number</label>
                        <x-form.input name="card_number" type="text" placeholder="0000 0000 0000 0000"/>
                    </div>
                    <div class="mb-3 -mx-2 flex items-end">
                        <div class="px-2 w-1/3">
                            <label class="block mb-3 text-sm font-semibold text-gray-500">Expiration Year</label>
                            <input name="expiration_year" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="0000" type="text">
                            <x-form.error name="expiration_date" />
                        </div>
                        <div class="px-2 w-1/3">
                            <label class="block mb-3 text-sm font-semibold text-gray-500">Expiration Month</label>
                            <input name="expiration_month" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="00" type="text">
                            <x-form.error name="expiration_date" />
                        </div>
                        <div class="px-2 w-1/3">
                            <label class="block mb-3 text-sm font-semibold text-gray-500">CVC</label>
                            <input name="cvc" class="w-full px-3 py-2 mb-1 border-2 border-gray-200 rounded-md focus:outline-none focus:border-indigo-500 transition-colors" placeholder="000" type="password">
                            <x-form.error name="security_code" />
                        </div>
                    </div>
                    <div class="w-full mx-auto bg-red-200 mr-10">
                        <button class="inline-block float-left w-1/3 max-w-xs bg-gray-800 hover:bg-gray-900 focus:bg-gray-900 text-white rounded-lg px-3 py-3 font-semibold">Continue</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endauth
</x-bootstrap>
