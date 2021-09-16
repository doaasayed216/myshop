@props(['name', 'placeholder', 'type'])
<div>
    <x-form.error :name="$name"/>
    <input
        type="{{$type}}"
        class="block border border-grey-light p-3 rounded mb-4 {{$type == 'file' ? 'inline float-left border-none' : 'w-full'}}"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        {{$attributes(['value' => old($name)])}}
        autocomplete="off"/>
</div>
