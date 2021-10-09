<x-admin-list >

    <div class="h-1/2 w-3/5 p-4 border border-gray-200 rounded-xl shadow-l bg-white mt-10 mb-10 mx-auto">
        <form method="POST" action="/admin/roles" class="" enctype="multipart/form-data">
            @csrf
            <h1 class="text-xl font-bold mb-5 text-gray-600">Add new Role</h1>
            <x-form.input type="text" name="name" placeholder="Role"/>
            <x-form.button name="Add"/>
        </form>
    </div>
</x-admin-list>
