<x-bootstrap>
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form method="POST" action="/register">
                @csrf
                <x-form.input type="text" name="name" placeholder="Full name" />
                <x-form.input type="text" name="email" placeholder="Email" />
                <x-form.input type="password" name="password" placeholder="Password" />
                <x-form.input type="password" name="password_confirmation" placeholder="Confirm password" />
                <x-form.button name="Create Account"/>

                <div class="text-center text-sm text-grey-dark mt-4">
                    By signing up, you agree to the
                    <a class="no-underline border-b border-grey-dark text-blue-500" href="#">
                        Terms of Service
                    </a> and
                    <a class="no-underline border-b border-grey-dark text-blue-500" href="#">
                        Privacy Policy
                    </a>
                </div>
        </form>
        </div>
        <div class="text-grey-dark mt-6">
            Already have an account?
            <a class="no-underline border-b border-blue text-blue-500" href="/login">
                Log in
            </a>.
        </div>
    </div>
</div>

</x-bootstrap>>
