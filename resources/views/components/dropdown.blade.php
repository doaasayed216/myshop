@props(['name', 'href', 'icon'])
    <a href="{{$href}}" class="
        block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-transparent rounded-lg dark-mode:bg-transparentdark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
            <span>
                <img src="/images/{{$icon}}" width="20" height="20" class="inline">
            </span>
        <span class="ml-2 font-medium" class="inline">{{$name}}</span>
    </a>


