<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div x-data="{ show: false }" @click.away="show = false" class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <div @click="show = ! show">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-white text-2xl">{{strtoupper('my shop')}}</a>
                </div>
            </div>

            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                @auth
                    <a href="/cart"><img src="/images/cart.png" height="30" width="30"></a>
                    <div x-data="{ show: false }" @click.away="show = false" class="ml-3 relative">
                        <div @click="show = ! show">
                            <button type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </button>
                        </div>
                        <div x-show="show" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="display: none;">

                            <a href="/my-orders" class="block px-4 py-2 hover:bg-gray-200 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Orders</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200 text-sm text-gray-700"
                               role="menuitem" tabindex="-1" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Sign out</a>
                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
            </div>
                @else
                    <a href="/register" class="text-white mr-5">Sign up</a>
                    <a href="/login" class="text-white">Login</a>
                @endauth
        </div>
    </div>
</nav>
