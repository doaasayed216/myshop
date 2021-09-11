@props(['name', 'icon', 'href'])
<li>
    <a href="{{$href}}" class="flex px-6 py-2 font-medium text-gray-600 transition-transform transform hover:translate-x-1">
        <span class="mr-2"><img src="/images/{{$icon}}" width="20" height="20"></span>
        <span>{{$name}}</span>
    </a>
</li>
