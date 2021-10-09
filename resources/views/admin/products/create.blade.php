<x-admin-list >

<div class="h-1/2 w-3/5 p-4 border border-gray-200 rounded-xl shadow-l bg-white mt-10 mb-10 mx-auto">
    <form method="POST" action="/admin/products" class="" enctype="multipart/form-data">
        @csrf
        <h1 class="text-xl font-bold mb-5 text-gray-600">Add new product</h1>
        <div>
            <x-form.error name="category_id"/>
            <label for="category" class="mr-2">Category </label>
            <select name="category_id" id="category" class="mb-5 p-2 bg-gray-100">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <x-form.input type="text" name="name" placeholder="Product name"/>
        <x-form.textarea name="description" placeholder="Description"/>
        <x-form.input type="number" name="price" placeholder="Price"/>
        <x-form.input type="file" name="img_path" placeholder=""/>
        <x-form.button name="Add"/>
    </form>
</div>
</x-admin-list>
