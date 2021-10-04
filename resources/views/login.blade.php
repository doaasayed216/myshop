<x-bootstrap title="Login">
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Log In</h1>
            <form method="POST" action="/login">
                @csrf
                <x-form.input type="text" name="email" placeholder="Email" />
                <x-form.input type="password" name="password" placeholder="Password" />
                <div><input type="checkbox" class="mb-5" name="remember"> Remember me</div>
                <x-form.button name="Log In"/>
                <div class="text-center mt-3">
                    <a href="/forgot-password" class="text-blue-500 text-center">
                        Forgotten Password?
                    </a>
                </div>
                <a href="/login/github">Login with github</a>
            </form>
        </div>
        <div class="text-grey-dark mt-6">
            Not registered yet?
            <a class="no-underline border-b border-blue text-blue-500" href="/register">
                Sign Up
            </a>.
        </div>
    </div>
</div>
</x-bootstrap>
