<x-admin-list>
    <form method="POST" action="/admin/users/{{$user->id}}" class="">
        @csrf
        @method('PATCH')
        <h1 class="text-xl font-bold mb-5 text-gray-600">Edit user</h1>
        <x-form.input type="text" name="name" placeholder="Full name" required :value="old('name', $user->name)"/>
        <x-form.input type="email" name="email" placeholder="Email" required :value="old('email', $user->email)"/>
        <div>
            <x-form.error name="isAdmin"/>
            <label for="role">User type:</label>
            <select name="role_id" id="role" class="ml-2 bg-gray-100 p-2 mb-5 border border-gray-400">
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{old('role_id', $user->role->id) == $role->id ? 'selected' : ''}}>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <x-form.button name="Update"/>
    </form>
</x-admin-list>
