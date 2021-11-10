<x-admin-list>
 <form method="POST" action="/admin/users" class="">
    @csrf
    <h1 class="text-gray-600 text-xl font-bold mb-5">Add new user</h1>
    <x-form.input type="text" name="name" placeholder="Full name" required/>
    <x-form.input type="email" name="email" placeholder="Email" required/>
    <x-form.input type="password" name="password" placeholder="Password" required/>
    <x-form.input type="password" name="password_confirmation" placeholder="Confirm password" required/>
    <div>
        <x-form.error name="role_id"/>
        <label for="role">User type:</label>
        <select name="role_id" id="role" class="ml-2 bg-gray-100 p-2 mb-5 border border-gray-400">
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
    </div>
    <x-form.button name="Add"/>
</form>
</x-admin-list>
