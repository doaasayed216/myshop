@props(['name', 'controls', 'icon'])

<li>
    <button
        class="flex items-center w-full px-4 py-2 text-gray-600 transition-transform transform rounded-md hover:translate-x-1 focus:outline-none focus:ring"
        data-bs-target="#{{$controls}}"
        data-bs-toggle="collapse"
        aria-expanded="false"
        aria-controls="{{$controls}}">
                            <span>
                                <img src="/images/{{$icon}}" width="20" height="20">
                            </span>
        <span class="ml-2 font-medium">{{$name}}</span>
        <span class="ml-auto">
                                <svg
                                    class="w-4 h-4 transition-transform"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                                </span>
    </button>

    {{$slot}}
</li>
