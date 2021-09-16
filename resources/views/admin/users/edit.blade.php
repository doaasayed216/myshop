<x-admin-list />

<div class="w-1/2 mt-8 ml-12 inline-block p-8 mx-auto border border-gray-200 rounded-xl shadow-l">
    <form method="POST" action="/admin/users/{{$user->id}}" class="">
        @csrf
        @method('PATCH')
        <h1 class="text-xl font-bold mb-5">Edit user</h1>
        <x-form.input type="text" name="name" placeholder="Full name" :value="old('name', $user->name)"/>
        <x-form.input type="email" name="email" placeholder="Email" :value="old('email', $user->email)"/>
        <div>
            <x-form.error name="isAdmin"/>
            <label for="isAdmin">User type:</label>
            <select name="isAdmin" id="isAdmin" class="ml-2 bg-gray-100 p-2 mb-5 border border-gray-400">
                <option value="1" {{old('isAdmin', $user->isAdmin) == true ? 'selected' : ''}}>Admin User</option>
                <option value="0" {{old('isAdmin', $user->isAdmin) == false ? 'selected' : ''}}>Regular User</option>
            </select>
        </div>
        <x-form.button name="Update"/>
    </form>
</div>
