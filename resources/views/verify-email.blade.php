<x-bootstrap>
    <div class="w-1/3 border border-gray-200 rounded-xl shadow-xl mx-auto mt-40 p-8">
        <h1 class="text-xl font-bold mb-6">Enter the code from your email</h1>
        <p class="mb-5">Let us know that this email address belongs to you. Click the link we sent to yout email address {{auth()->user()->email}}</p>
        <form method="POST" action="/email/verification-notification" class="p-3 rounded-xl text-white bg-gray-900 w-1/4">
            @csrf
            <button>Resend link</button>
        </form>
    </div>
</x-bootstrap>>
