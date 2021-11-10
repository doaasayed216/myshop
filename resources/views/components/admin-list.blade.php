<x-admin-bootstrap>
    <div @click.away="open = false" class="flex flex-col w-full md:w-64 text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0" x-data="{ open: false }" id="secondary">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">Admin Panel</a>
            <button class="rounded-lg md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            @can('manage', \App\Models\Role::class)
                <x-dropdown name="Roles" href="/admin/roles" icon="role.png"/>
            @endcan
            @can('manage', \App\Models\User::class)
                <x-dropdown name="Users" href="/admin/users" icon="users.png"/>
            @endcan
            @can('manage', \App\Models\Category::class)
                <x-dropdown name="Categories" href="/admin/categories" icon="categories.png" />
            @endcan
            <x-dropdown name="Products"  href="/admin/products" icon="products.png" />
            <x-dropdown name="Orders" href="/admin/orders" icon="orders.png" />

            <div class="flex-shrink-0 px-4 py-2">
                <form method="POST" action="/logout" class="mt-5">
                    @csrf
                    <button
                        class="w-full bg-gray-800 hover:bg-gray-900 px-4 py-2 text-lg font-medium text-center text-white transition-transform transform rounded-md hover:scale-105 neumorphism-shadow focus:outline-none focus:ring">
                        Sign out
                    </button>
                </form>
            </div>
        </nav>
    </div>
    <div class="h-1/2 w-4/5 p-4 border border-gray-200 rounded-xl shadow-l bg-white mt-10 mb-10 mx-auto" id="primary">
        {{$slot}}
    </div>
</x-admin-bootstrap>
