<x-admin-list >
     <form method="POST" action="/admin/roles" class="" enctype="multipart/form-data">
        @csrf
        <h1 class="text-xl font-bold mb-5 text-gray-600">Add new Role</h1>
        <x-form.input type="text" name="name" placeholder="Role" required/>
        <x-form.button name="Add"/>
     </form>
</x-admin-list>
