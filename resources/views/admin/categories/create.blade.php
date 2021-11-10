<x-admin-list >
    <form method="POST" action="/admin/categories" class="" enctype="multipart/form-data">
        @csrf
        <h1 class="text-xl font-bold mb-5 text-gray-600">Add new Category</h1>
        <x-form.input type="text" name="name" placeholder="Category name" required/>
        <x-form.button name="Add"/>
    </form>
</x-admin-list>
