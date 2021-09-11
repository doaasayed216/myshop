<x-admin-list />

<div class="w-1/2 mt-8 ml-12 inline-block p-8 mx-auto border border-gray-200 rounded-xl shadow-l">
    <form method="POST" action="" class="">
        @csrf
        <h1 class="text-xl font-bold mb-5">Add new product</h1>
        <x-form.input type="text" name="name" placeholder="Product name"/>
        <x-form.input type="number" name="price" placeholder="Price"/>
        <x-form.input type="file" name="img" placeholder=""/>
        <x-form.textarea name="name" placeholder="Description"/>
        <x-form.button name="Add"/>
    </form>
</div>
