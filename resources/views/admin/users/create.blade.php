<x-admin-list />

<div class="w-1/2 mt-8 ml-12 inline-block p-8 mx-auto border border-gray-200 rounded-xl shadow-l">
    <form method="POST" action="" class="">
        @csrf
        <h1 class="text-xl font-bold mb-5">Add new user</h1>
        <x-form.input type="text" name="name" placeholder="Full name"/>
        <x-form.input type="email" name="email" placeholder="Email"/>
        <x-form.input type="password" name="password" placeholder="Password"/>
        <x-form.input type="password" name="password_confirmation" placeholder="Confirm password"/>
        <label for="type">User type:</label>
        <select name="type" id="type" class="ml-2 bg-gray-100 p-2 mb-5 border border-gray-400">
            <option>Admin User</option>
            <option>Regular User</option>
        </select>
        <x-form.button name="Add"/>
    </form>
</div>
