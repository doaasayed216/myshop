<x-admin-list />

<div class="w-1/2 mt-8 ml-12 inline-block p-8 mx-auto border border-gray-200 rounded-xl shadow-l">
    <form method="POST" action="/admin/product/create" class="" enctype="multipart/form-data">
        @csrf
        <h1 class="text-xl font-bold mb-5">Add new product</h1>
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
