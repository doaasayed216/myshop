@props(['name', 'placeholder', 'type'])
<div>
    <x-form.error :name="$name"/>
    <input
        type="{{$type}}"
        class="block border border-grey-light w-full p-3 rounded mb-4"
        name="{{$name}}"
        placeholder="{{$placeholder}}"
        value="{{old($name)}}"
        required autocomplete="off"/>
</div>
