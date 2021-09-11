<x-bootstrap title="Password reset">
<div class="w-1/3 border border-gray-200 rounded-xl shadow-xl mx-auto mt-20 p-8">
    <h1 class="text-xl font-bold mb-6">Choose a new password</h1>
    <p class="mb-5">Create a new password that is at least 6 characters long. A strong password has a combination of letters, digits and punctuation marks.</p>
    <form method="POST" action="/reset-password">
        @csrf
        <x-form.input type="email" name="email" placeholder="Email" />
        <x-form.input type="password" name="password" placeholder="New password" />
        <x-form.input type="password" name="password_confirmation" placeholder="Confirm password" />
        <input type="hidden" name="token" value="{{$token}}">
        <x-form.button name="Continue"/>
    </form>
</div>
</x-bootstrap>


