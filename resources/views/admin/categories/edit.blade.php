<x-admin-list >
    <form method="POST" action="/admin/categories/{{$category->id}}" class="">
        @csrf
        @method('PATCH')
        <h1 class="text-xl font-bold mb-5 text-gray-600">Edit category</h1>
        <x-form.input type="text" name="name" placeholder="Name" required :value="old('name', $category->name)"/>
        <x-form.button name="Update"/>
    </form>
</x-admin-list>
