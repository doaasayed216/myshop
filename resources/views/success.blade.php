<x-bootstrap title="Order place successfully">
    <x-nav />
    @auth
    <div class="w-3/5 mx-auto mt-10 items-center justify-items p-10">
        <img src="/images/success.png" height="300" width="300" class="mx-auto">
        <p class="w-1/2 mx-auto pl-5 text-medium font-semibold mt-5">
            Your order placed successfully,
            <a href="/my-orders"  class="text-blue-500 mx-auto">Track your orders now</a>
        </p>
    </div>
    @endauth
</x-bootstrap>
