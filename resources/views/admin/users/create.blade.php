<x-admin-list>

    <div class="h-1/2 w-3/5 p-4 border border-gray-200 rounded-xl shadow-l bg-white mt-10 mb-10 mx-auto">
        <form method="POST" action="/admin/users" class="">
        @csrf
        <h1 class="text-gray-600 text-xl font-bold mb-5">Add new user</h1>
        <x-form.input type="text" name="name" placeholder="Full name"/>
        <x-form.input type="email" name="email" placeholder="Email"/>
        <x-form.input type="password" name="password" placeholder="Password"/>
        <x-form.input type="password" name="password_confirmation" placeholder="Confirm password"/>
        <div>
            <x-form.error name="isAdmin"/>
            <label for="role">User type:</label>
            <select name="role_id" id="role" class="ml-2 bg-gray-100 p-2 mb-5 border border-gray-400">
                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <x-form.button name="Add"/>
    </form>
</div>
</x-admin-list>
