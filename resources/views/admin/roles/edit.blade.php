<x-admin-list >
    <form method="POST" action="/admin/roles/{{$role->id}}">
        @csrf
        @method('PATCH')
        <h1 class="text-xl font-bold mb-5 text-gray-600">Edit role</h1>
        <x-form.input type="text" name="name" placeholder="Name" required :value="old('name', $role->name)"/>
        <x-form.button name="Update"/>
    </form>
</x-admin-list>
