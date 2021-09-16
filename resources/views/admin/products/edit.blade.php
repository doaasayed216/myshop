<x-admin-list />
<div class="w-1/2 mt-8 ml-12 inline-block p-8 mx-auto border border-gray-200 rounded-xl shadow-l">
    <form method="POST" action="/admin/products/{{$product->id}}" class="" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <h1 class="text-xl font-bold mb-5">Edit product</h1>
        <div>
            <x-form.error name="category_id"/>
            <label for="category" class="mr-2">Category </label>
            <select name="category_id" id="category" class="mb-5 p-2 bg-gray-100">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{old('category_id', $product->category_id) == $category->id ? 'selected' : ''}}>
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <x-form.input type="text" name="name" placeholder="Product name" :value="old('name', $product->name)"/>
        <x-form.textarea name="description" placeholder="Description">{{old('description', $product->description)}}</x-form.textarea>
        <x-form.input type="number" name="price" placeholder="Price" :value="old('price', $product->price)"/>
        <x-form.input type="file" name="img_path" placeholder="" :value="old('img_path', $product->img_path)"/>
        <img src="{{asset('storage/' . $product->img_path)}}" height="100" width="100" class="inline float-right">
        <x-form.button name="Update"/>
    </form>
</div>
