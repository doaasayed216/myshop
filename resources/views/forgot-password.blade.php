<x-bootstrap>
<div class="w-1/3 border border-gray-200 rounded-xl shadow-xl mx-auto mt-40 p-8">
    <h1 class="text-xl font-bold mb-6">Find your account</h1>
    <p class="mb-5">Please enter your email address or mobile number to search for your account.</p>
    <form method="POST" action="/forgot-password">
        @csrf
        <x-form.input type="email" name="email" placeholder="Email" />
        <x-form.button name="Search"/>
    </form>
</div>
</x-bootstrap>



