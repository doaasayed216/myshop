@props(['title'])
<x-bootstrap title="Admin Panel">
    <div class="flex w-1/5 h-screen antialiased text-gray-900 bg-gray-100 float-left">
        <aside class="flex-shrink-0 p-4 w-72 h-full">
            <div class="flex flex-col h-full pt-8 pb-4">
                <h1 class="text-xl font-extrabold pl-10">{{$title}}</h1>
                <nav class="flex-1 max-h-full p-4 mt-2 overflow-y-hidden">

                    {{$slot}}

                </nav>
            </div>
        </aside>
    </div>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</x-bootstrap>
