@props(['active' => false])

<a {{$attributes->class([
    "block text-left px-3 text-sm leading-6 hover:bg-gray-500 focus:bg-gray-500 hover:text-white focus:text-white",
    "bg-gray-800 text-white" => $active])}}>
    {{$slot}}</a>
