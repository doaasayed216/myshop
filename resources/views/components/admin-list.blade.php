<x-bootstrap title="Admin Panel">
    <div class="flex w-1/5 h-screen antialiased text-gray-900 bg-gray-100 float-left">
        <aside class="flex-shrink-0 p-4 w-72 h-full">
            <div class="flex flex-col h-full pt-8 pb-4">
                <h1 class="text-xl font-extrabold pl-10">Admin Panel</h1>
                <nav class="flex-1 max-h-full p-4 mt-2 overflow-y-hidden">
                    <ul class="max-h-full p-2 space-y-1 overflow-y-auto divide-y divide-blue-300">
                        <x-dropdown name="Users" controls="usersCollapse" icon="users.png">
                            <ul class="collapse" id="usersCollapse">
                                <x-dropdown-item name="Add" icon="add.png" href="/admin/user/create"/>
                                <x-dropdown-item name="View" icon="view.png" href="/admin/users"/>
                            </ul>
                        </x-dropdown>

                        <x-dropdown name="Products" controls="productsCollapse" icon="products.png">
                            <ul class="collapse" id="productsCollapse">
                                <x-dropdown-item name="Add" icon="add.png" href="/admin/product/create"/>
                                <x-dropdown-item name="View" icon="view.png" href="/admin/products"/>
                            </ul>
                        </x-dropdown>

                        <x-dropdown name="Categories" controls="categoriesCollapse" icon="users.png">
                            <ul class="collapse" id="categoriesCollapse">
                                <x-dropdown-item name="Add" icon="add.png" href="/admin/category/create"/>
                                <x-dropdown-item name="View" icon="view.png" href="/admin/categories"/>
                            </ul>
                        </x-dropdown>

                        <li><a href="/admin/orders" class="flex items-center px-4 py-2 text-gray-600 transition-transform transform rounded-md hover:translate-x-1 focus:ring focus:outline-none">
                                <span><img src="/images/orders.png" width="20" height="20"></span>
                                <span class="ml-2 font-medium">Orders</span></a></li>

                        <li><a href="" class="flex items-center px-4 py-2 text-gray-600 transition-transform transform rounded-md hover:translate-x-1 focus:ring focus:outline-none">
                                <span><img class="h-8 w-8 rounded-full"
                                           src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                           alt="" width="20" height="20"></span>
                                <span class="ml-2 font-medium">Profile</span></a></li>

                        <li><a href="#" class="flex items-center px-4 py-2 text-gray-600 transition-transform transform rounded-md hover:translate-x-1 focus:ring focus:outline-none">
                                <span><img src="/images/settings.png" width="20" height="20"></span>
                                <span class="ml-2 font-medium">Settings</span></a></li>

                    </ul>
                    <div class="flex-shrink-0 px-4 py-2">
                        <form method="POST" action="/logout">
                            @csrf
                            <button
                                class="w-full bg-gray-900 px-4 py-2 text-lg font-medium text-center text-gray-100 transition-transform transform rounded-md hover:scale-105 neumorphism-shadow focus:outline-none focus:ring"
                            >
                                Sign out
                            </button>
                        </form>

                    </div>
                </nav>
            </div>
        </aside>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</x-bootstrap>
