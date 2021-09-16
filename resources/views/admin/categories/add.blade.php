<x-admin-list />

<div class="w-1/2 mt-8 ml-12 inline-block p-8 mx-auto border border-gray-200 rounded-xl shadow-l">
    <form method="POST" action="/admin/{{$category->id}}/sub-category" class="" enctype="multipart/form-data">
        @csrf
        <h1 class="text-xl font-bold mb-5">Add new Category</h1>
        <x-form.input type="text" name="name" placeholder="Subcategory"/>
        <x-form.button name="Add"/>
    </form>
</div>
